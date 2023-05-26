<?php

namespace App\Http\Controllers;

use Auth;
use App\User; 
use App\Transactions;
use App\SubscriptionPlan;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;

use Session;

 require(base_path() . '/public/cashfree/common.php');
  

class CashfreeController extends Controller
{
	 
    public function cashfree_pay()
    {     
        if(!Auth::check() && Session::get('plan_id')=='')
        {

            \Session::flash('error_flash_message', trans('words.access_denied'));

            return redirect()->back();
            
        }   

         $plan_id = Session::get('plan_id');
         $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();

         $plan_amount=$plan_info->plan_price;
         $customer_id=Auth::user()->id;
         $customer_email=Auth::user()->email;
         $customer_phone=Auth::user()->phone;

         $return_url=\URL::to('cashfree/success/');

         $appId= getPaymentGatewayInfo(10,'cashfree_appid');
         $secret= getPaymentGatewayInfo(10,'cashfree_secret_key');
         $apiVersion="2022-01-01";

         if(getPaymentGatewayInfo(10,'mode')=="sandbox")
         {
            $baseUrl= "https://sandbox.cashfree.com/pg";  
         }
         else
         {
            $baseUrl= "https://api.cashfree.com/pg";
         }

         

         $headers = array(
            "content-type: application/json",
            "x-client-id: " . $appId,
            "x-client-secret: " . $secret,
            "x-api-version: " . $apiVersion,
        );

        $data = array(
            "order_amount" => $plan_amount,
            "order_currency" => "INR",
            "customer_details" => array(
                "customer_id" => "$customer_id",
                "customer_email" => "$customer_email",
                "customer_phone" => "$customer_phone"
            ),
            "order_meta" => array(
                "return_url" => $return_url . "?orderId={order_id}&token={order_token}",
                "notify_url" => "",
            )
            );

        $postResp = doPost($baseUrl . "/orders", $headers, $data);
        
        //dd($postResp);exit;

        $resp = $postResp;

        if($resp["code"] == 200){
            
            $paymentLink = $resp["data"]["payment_link"];

            return redirect($paymentLink);
             
        } else {
            //echo "Something went wrong with order creation! \n";
            //echo json_encode($resp["data"]);exit; 

            \Session::put('error_flash_message','Something went wrong with order creation!');
            return redirect('dashboard');
        }
 
    }

    public function cashfree_success()
    {   
        if(!Auth::check())
        {

            \Session::flash('error_flash_message', trans('words.access_denied'));
            return redirect()->back();            
        }


        $orderId = $_GET["orderId"];
        $orderToken = $_GET["token"];


         $appId= getPaymentGatewayInfo(10,'cashfree_appid');
         $secret= getPaymentGatewayInfo(10,'cashfree_secret_key');
         $apiVersion="2022-01-01";

         if(getPaymentGatewayInfo(10,'mode')=="sandbox")
         {
            $baseUrl= "https://sandbox.cashfree.com/pg";  
         }
         else
         {
            $baseUrl= "https://api.cashfree.com/pg";
         }

        $url = $baseUrl . "/orders/" . $orderId;
 
        $headers = array(
            "content-type: application/json",
            "x-client-id: " . $appId,
            "x-client-secret: " . $secret,
            "x-api-version: " . $apiVersion,
        );

        $orderResp = doGet($url, $headers);

        //dd($orderResp);

        //echo $orderResp["data"]["order_status"];  
        //echo $orderResp["data"]["order_id"];  


            if($orderResp["data"]["order_status"]=="PAID")
            {
                $payment_id= $orderResp["data"]["order_id"];

                $user_id=Auth::user()->id;
                $user_email=Auth::user()->email;           
                $user = User::findOrFail($user_id);

                 $plan_id = Session::get('plan_id');
                 $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();                 
                 $plan_name=$plan_info->plan_name;
                 $plan_days=$plan_info->plan_days;
                 $plan_amount=$plan_info->plan_price;       

                $user->plan_id = $plan_id;                    
                $user->start_date = strtotime(date('m/d/Y'));             
                $user->exp_date = strtotime(date('m/d/Y', strtotime("+$plan_days days")));
                
                $user->plan_amount = $plan_amount;
                $user->save();

                //Check duplicate
                $trans_info = Transactions::where('user_id',$user_id)->where('payment_id',$payment_id)->first();

                if($trans_info=="")
                {
                    $payment_trans = new Transactions;

                    $payment_trans->user_id = $user_id;
                    $payment_trans->email = $user_email;
                    $payment_trans->plan_id = $plan_id;
                    $payment_trans->gateway = 'Cashfree';
                    $payment_trans->payment_amount = $plan_amount;
                    $payment_trans->payment_id = $payment_id;
                    $payment_trans->date = strtotime(date('m/d/Y H:i:s'));    
                    $payment_trans->save();

                }

                Session::flash('plan_id',Session::get('plan_id'));
                 
                //Subscription Create Email
                $user_full_name=$user->name;

                $data_email = array(
                    'name' => $user_full_name
                     );    
         
                try{

                    \Mail::send('emails.subscription_created', $data_email, function($message) use ($user,$user_full_name){
                    $message->to($user->email, $user_full_name)
                        ->from(getcong('site_email'), getcong('site_name')) 
                        ->subject('Subscription Created');
                    });
                
                }catch (\Throwable $e) {
                 
                    \Log::info($e->getMessage()); 
                               
                }


                \Session::flash('success',trans('words.payment_success'));
                return redirect('dashboard');
                  
            }
            else
            {
                Session::flash('plan_id',Session::get('plan_id'));

                \Session::flash('error_flash_message',trans('words.payment_failed'));
                return redirect('dashboard');     
            }

    }

    
}
