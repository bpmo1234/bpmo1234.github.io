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
use Redirect;
use Input;
 
class InstamojoController extends Controller
{
	 
    public function instamojo_pay(Request $request)
    {   

        $data =  \Request::except(array('_token'));
        
        $inputs = $request->all();

        if(!Auth::check())
        {
            \Session::flash('error_flash_message', trans('words.access_denied'));
            return redirect('login');            
        }   

         $payment_mode=getPaymentGatewayInfo(5,'mode');
         $client_id=getPaymentGatewayInfo(5,'instamojo_client_id');
         $client_secret=getPaymentGatewayInfo(5,'instamojo_client_secret');

         if($payment_mode=="live")
         {
            $payment_oauth_url="https://api.instamojo.com/oauth2/token/";
            $payment_url="https://api.instamojo.com/v2/payment_requests/";
         }
         else
         {
            $payment_oauth_url="https://test.instamojo.com/oauth2/token/";
            $payment_url="https://test.instamojo.com/v2/payment_requests/";
         }

          

         $plan_id = Session::get('plan_id'); 
         //$plan_id = 6;
         $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();                 
         $plan_name=$plan_info->plan_name;         
         $plan_amount=$plan_info->plan_price;
 
        $user_id=Auth::user()->id;           
        $user = User::findOrFail($user_id);

        $name = $user->name;
        $email= $user->email;
        $phone= $user->phone?$user->phone:'';

        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $payment_oauth_url);     
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $payload = Array(
            'grant_type' => 'client_credentials',
            'client_id' => $client_id,
            'client_secret' => $client_secret
          );

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 

        //dd($response);
        //exit;
        $token_obj=json_decode($response);
        
        $access_token=$token_obj->access_token;
        
        $success_url=\URL::to('instamojo/success/');

        $ch1 = curl_init();

        curl_setopt($ch1, CURLOPT_URL, $payment_url);
        curl_setopt($ch1, CURLOPT_HEADER, FALSE);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch1, CURLOPT_HTTPHEADER,array('Authorization: Bearer '.$access_token));

        $payload = array(
          'purpose' => $plan_name,
          'amount' => $plan_amount,
          'buyer_name' => $name,
          'email' => $email,
          'phone' => $phone,
          'redirect_url' => $success_url,
          'send_email' => 'True',
          'send_sms' => 'True',
          'allow_repeated_payments' => 'False',
        );

        curl_setopt($ch1, CURLOPT_POST, true);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response1 = curl_exec($ch1);
        curl_close($ch1);

        //dd($response1);
        //exit;

        $payment_obj=json_decode($response1);

        $redirect_url=$payment_obj->longurl;
          
        return redirect($redirect_url);

    }

    public function instamojo_success()
    {

        if(!Auth::check())
        {
            \Session::flash('error_flash_message', trans('words.access_denied'));
            return redirect('login');            
        }
         
        $payment_id=$_GET['payment_id'];

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
        $payment_trans->gateway = 'Instamojo';
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

 
}
