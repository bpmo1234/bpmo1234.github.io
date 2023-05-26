<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Transactions;
use App\SubscriptionPlan;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;

  
class FlutterwaveController extends Controller
{
    

    public function flutterwave_pay(Request $request)
    {   
        $data =  \Request::except(array('_token'));
        
        $inputs = $request->all();
        
        $user_id=Auth::user()->id; 
        $user_email=Auth::user()->email;
        $user_phone=Auth::user()->phone;
        $user_name=Auth::user()->name;
        
        $plan_id = Session::get('plan_id');
        $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();
         
        $plan_name=$plan_info->plan_name;          
        $plan_amount=$plan_info->plan_price; 

        $currency_code=getcong('currency_code')?getcong('currency_code'):'USD';
        $callback_url=\URL::to('flutterwave/success/');

        $flutterwave_secret_key = getPaymentGatewayInfo(8,'flutterwave_secret_key'); 
        
        $customer_data=array( "email"=>$user_email,"phonenumber"=>$user_phone,"name"=>$user_name);

        $customizations_data=array( "title"=>$plan_name,"description"=>$plan_name,"logo"=>"https://demo.sceneone.tv/upload/logo.png");


        $postdata =  array("tx_ref" => 'fwtx_ref'.rand(0,99999),'amount' => $plan_amount,"currency"=>$currency_code,"payment_options"=>'card,account,qr,mobilemoney,mobilemoneyghana,mobilemoneyrwanda,mobilemoneyzambia,mobilemoneyuganda',"redirect_url"=> $callback_url,'customer'=>$customer_data,'customizations'=>$customizations_data);

        $url = "https://api.flutterwave.com/v3/payments";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
          'Authorization: Bearer '.$flutterwave_secret_key,
          'Content-Type: application/json',

        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $request = curl_exec ($ch);

        curl_close ($ch);

        if ($request)
        {
          $result = json_decode($request, true);
            
          return redirect($result['data']['link']);
        }
        else
        {
            \Session::put('error_flash_message',trans('words.payment_failed'));
            return redirect('dashboard');
        }

    }

    public function flutterwave_success()
    {

        if($_GET['status']=="cancelled")
        {
            \Session::flash('error_flash_message',trans('words.payment_failed'));
             return redirect('dashboard');

        }

        $transaction_id=$_GET['transaction_id'];

        $flutterwave_secret_key = getPaymentGatewayInfo(8,'flutterwave_secret_key'); 

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/$transaction_id/verify",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$flutterwave_secret_key
              ),
            ));

            $request = curl_exec($curl);

            curl_close($curl);

            $result = json_decode($request, true);


             //dd($result);  
            //exit;

            if ($result['status']=='success' && $result['data']['status'] == 'successful') 
            {
                $payment_id = $result['data']['flw_ref'];

                $plan_id = Session::get('plan_id');

                $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();
                $plan_name=$plan_info->plan_name;
                $plan_days=$plan_info->plan_days;
                $plan_amount=$plan_info->plan_price;
         
                $user_id=Auth::user()->id;           
                $user = User::findOrFail($user_id);

                $user->plan_id = $plan_id;                    
                $user->start_date = strtotime(date('m/d/Y'));             
                $user->exp_date = strtotime(date('m/d/Y', strtotime("+$plan_days days")));
                
                $user->plan_amount = $plan_amount;
                $user->save();


                $payment_trans = new Transactions;

                $payment_trans->user_id = Auth::user()->id;
                $payment_trans->email = Auth::user()->email;
                $payment_trans->plan_id = $plan_id;
                $payment_trans->gateway = 'Flutterwave';
                $payment_trans->payment_amount = $plan_amount;
                $payment_trans->payment_id = $payment_id;
                $payment_trans->date = strtotime(date('m/d/Y H:i:s'));                    
                $payment_trans->save();

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
                \Session::flash('error_flash_message',trans('words.payment_failed'));
                return redirect('dashboard');
            }

    }
 
}