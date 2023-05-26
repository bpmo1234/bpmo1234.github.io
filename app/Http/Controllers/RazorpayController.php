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

use Session;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class RazorpayController extends Controller
{
    
    public function get_order_id(Request $request)
    {
        $input = $request->all();

        //echo $id=$input['id'];

        $razor_key = getPaymentGatewayInfo(3,'razorpay_key');
        $razor_secret = getPaymentGatewayInfo(3,'razorpay_secret'); 

        $user_id=Auth::user()->id;  
 
         $api = new Api($razor_key, $razor_secret);

         $plan_id = Session::get('plan_id');
         $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();
         
         $plan_name=$plan_info->plan_name;          
         $plan_amount=$plan_info->plan_price*100; 

         $currency_code='INR';

         //echo Session::get('razorpay_order_id');exit;

         if(Session::get('razorpay_order_id'))
         {
             
            $orderId = Session::get('razorpay_order_id'); 
         }
         else
         {
            $order  = $api->order->create(array('receipt' => 'user_rcptid_'.$user_id, 'amount' => $plan_amount, 'currency' => $currency_code)); // Creates order
            $orderId = $order['id']; 
             
            Session::put('razorpay_order_id', $orderId);
         }

        echo $orderId; 
        exit;
    }
  
    public function payment_success(Request $request)
    {
        $razor_key = getPaymentGatewayInfo(3,'razorpay_key');
        $razor_secret = getPaymentGatewayInfo(3,'razorpay_secret');   

    	$plan_id = Session::get('plan_id');

        $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();
        $plan_name=$plan_info->plan_name;
        $plan_days=$plan_info->plan_days;
        $plan_amount=$plan_info->plan_price;

        //$plan_name=Session::get('plan_name').' membership';

        $currency_code=getcong('currency_code')?getcong('currency_code'):'USD';

        $input = $request->all();

        $razorpay_payment_id=$input['razorpay_payment_id'];

        //Capture a Payment
        $api = new Api($razor_key, $razor_secret);

        $payment = $api->payment->fetch($razorpay_payment_id);
		$payment->capture(array('amount' => $plan_amount*100, 'currency' => $currency_code));

        $user_id=Auth::user()->id;
           
        $user = User::findOrFail($user_id);

        $user->plan_id = $plan_id;                    
        $user->start_date = strtotime(date('m/d/Y'));             
        $user->exp_date = strtotime(date('m/d/Y', strtotime("+$plan_days days")));
        
        $user->plan_amount = $plan_amount;
        //$user->subscription_status = 0;
        $user->save();


        $payment_trans = new Transactions;

        $payment_trans->user_id = Auth::user()->id;
        $payment_trans->email = Auth::user()->email;
        $payment_trans->plan_id = $plan_id;
        $payment_trans->gateway = 'Razorpay';
        $payment_trans->payment_amount = $plan_amount;
        $payment_trans->payment_id = $razorpay_payment_id;
        $payment_trans->date = strtotime(date('m/d/Y H:i:s'));                    
        $payment_trans->save();

        Session::flash('plan_id',Session::get('plan_id'));
        Session::flash('razorpay_order_id',Session::get('razorpay_order_id'));
        
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
             
    
}
