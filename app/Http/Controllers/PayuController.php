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

 
class PayuController extends Controller
{
	  
    public function payu_success(Request $request)
    {   
        if(!Auth::check())
        {

            \Session::flash('error_flash_message', trans('words.access_denied'));

            return redirect('login');
            
        }
          
         $input = $request->all();
 
        /* echo $input['status'];
         echo $input['mihpayid'];
         print_r($input);
         exit;
        */


        if($input['status']=="success")
        {
             
                $payment_id=$input['mihpayid'];
                 

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
                
                 //$user->subscription_status = 0;
                $user->save();

                //Check duplicate
                $trans_info = Transactions::where('user_id',$user_id)->where('payment_id',$payment_id)->first();

                if($trans_info=="")
                {
                    $payment_trans = new Transactions;

                      
                    $payment_trans->user_id = Auth::user()->id;
                    $payment_trans->email = Auth::user()->email;
                    $payment_trans->plan_id = $plan_id;
                    $payment_trans->gateway = 'Payu';
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

            $error_msg=$input['error_Message'];

            \Session::flash('error_flash_message','Payment fail!'.$error_msg);
            return redirect('dashboard'); 
        }
    }

    public function payu_fail(Request $request)
    {

        $input = $request->all();

          
        $error_msg=$input['error_Message'];

        Session::flash('plan_id',Session::get('plan_id'));

        \Session::flash('error_flash_message','Payment fail!'.$error_msg);
        return redirect('dashboard'); 
    }

         
    
}
