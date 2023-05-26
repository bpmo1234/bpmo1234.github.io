<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\PaymentGateway;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;

class PaymentGatewayController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
        check_verify_purchase();
		  
    }
    public function list()
    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.payment_gateway');
              
        $list = PaymentGateway::orderBy('id')->get();
         
        return view('admin.pages.payment_gateway_list',compact('page_title','list'));
    }
    
    public function edit($post_id)    
    {     
            if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }  

          
          $post_info = PaymentGateway::findOrFail($post_id);  
            
          $gateway_info=json_decode($post_info->gateway_info);

          //echo $gateway_info->mode;
         // exit; 

          if($post_id==1)
          {
            $page_title='PayPal';

            return view('admin.pages.gateway.paypal',compact('page_title','post_info','gateway_info'));
          }
          else if($post_id==2)
          {
            $page_title='Stripe';

            return view('admin.pages.gateway.stripe',compact('page_title','post_info','gateway_info'));
          }
          else if($post_id==3)
          {
            $page_title='Razorpay';

            return view('admin.pages.gateway.razorpay',compact('page_title','post_info','gateway_info'));
          }
          else if($post_id==4)
          {
            $page_title='Paystack';

            return view('admin.pages.gateway.paystack',compact('page_title','post_info','gateway_info'));
          }
          else if($post_id==5)
          {
            $page_title='Instamojo';

            return view('admin.pages.gateway.instamojo',compact('page_title','post_info','gateway_info'));
          }
          else if($post_id==6)
          {
            $page_title='PayUMoney';

            return view('admin.pages.gateway.payu',compact('page_title','post_info','gateway_info'));
          }
          else if($post_id==7)
          {
            $page_title='mollie';

            return view('admin.pages.gateway.mollie',compact('page_title','post_info','gateway_info'));
          }
          else if($post_id==8)
          {
            $page_title='Flutterwave';

            return view('admin.pages.gateway.flutterwave',compact('page_title','post_info','gateway_info'));
          }
          else if($post_id==9)
          {
            $page_title='Paytm';

            return view('admin.pages.gateway.paytm',compact('page_title','post_info','gateway_info'));
          }
          else if($post_id==10)
          {
            $page_title='Cashfree';

            return view('admin.pages.gateway.cashfree',compact('page_title','post_info','gateway_info'));
          }

 
    }    
    
    public function paypal(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          putPermanentEnv('PAYPAL_MODE', $inputs['mode']);
          
          if($inputs['mode']=="sandbox")
          {
            putPermanentEnv('PAYPAL_SANDBOX_CLIENT_ID', $inputs['paypal_client_id']);
            putPermanentEnv('PAYPAL_SANDBOX_CLIENT_SECRET', $inputs['paypal_secret']);
          }
          else
          {
            putPermanentEnv('PAYPAL_LIVE_CLIENT_ID', $inputs['paypal_client_id']);
            putPermanentEnv('PAYPAL_LIVE_CLIENT_SECRET', $inputs['paypal_secret']);
          }
           
          $mode= $inputs['mode'];
          $paypal_client_id= $inputs['paypal_client_id'];
          $paypal_secret= $inputs['paypal_secret'];

          $braintree_merchant_id= $inputs['braintree_merchant_id'];
          $braintree_public_key= $inputs['braintree_public_key'];
          $braintree_private_key= $inputs['braintree_private_key'];
          $braintree_merchant_account_id= $inputs['braintree_merchant_account_id'];

          $gateway_data=json_encode(['mode' => $mode,'paypal_client_id' => $paypal_client_id,'paypal_secret' => $paypal_secret,'braintree_merchant_id' => $braintree_merchant_id,'braintree_public_key' => $braintree_public_key,'braintree_private_key' => $braintree_private_key,'braintree_merchant_account_id' => $braintree_merchant_account_id]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    } 

    public function stripe(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          $stripe_secret_key= $inputs['stripe_secret_key'];
          $stripe_publishable_key= $inputs['stripe_publishable_key'];

          $gateway_data=json_encode(['stripe_secret_key' => $stripe_secret_key,'stripe_publishable_key' => $stripe_publishable_key]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

    public function razorpay(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          $razorpay_key= $inputs['razorpay_key'];
          $razorpay_secret= $inputs['razorpay_secret'];

          $gateway_data=json_encode(['razorpay_key' => $razorpay_key,'razorpay_secret' => $razorpay_secret]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }
    
    public function paystack(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          $paystack_secret_key= $inputs['paystack_secret_key'];
          $paystack_public_key= $inputs['paystack_public_key'];

          $gateway_data=json_encode(['paystack_secret_key' => $paystack_secret_key,'paystack_public_key' => $paystack_public_key]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

    public function instamojo(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          $mode= $inputs['mode'];
          $instamojo_client_id= $inputs['instamojo_client_id'];
          $instamojo_client_secret= $inputs['instamojo_client_secret'];

          $gateway_data=json_encode(['mode' => $mode,'instamojo_client_id' => $instamojo_client_id,'instamojo_client_secret' => $instamojo_client_secret]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

    public function payu(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          $mode= $inputs['mode'];  
          $payu_merchant_id= $inputs['payu_merchant_id'];  
          $payu_key= $inputs['payu_key'];
          $payu_salt= $inputs['payu_salt'];

          $gateway_data=json_encode(['mode' => $mode,'payu_merchant_id' => $payu_merchant_id,'payu_key' => $payu_key,'payu_salt' => $payu_salt]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

    public function mollie(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          $mollie_api_key= $inputs['mollie_api_key'];
 
          $gateway_data=json_encode(['mollie_api_key' => $mollie_api_key]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

    public function flutterwave(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          $flutterwave_public_key= $inputs['flutterwave_public_key'];
          $flutterwave_secret_key= $inputs['flutterwave_secret_key'];
          $flutterwave_encryption_key= $inputs['flutterwave_encryption_key'];
 
          $gateway_data=json_encode(['flutterwave_public_key' => $flutterwave_public_key,'flutterwave_secret_key' => $flutterwave_secret_key,'flutterwave_encryption_key' => $flutterwave_encryption_key]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

    public function paytm(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          $mode= $inputs['mode'];
          $paytm_merchant_id= $inputs['paytm_merchant_id'];
          $paytm_merchant_key= $inputs['paytm_merchant_key'];

          $gateway_data=json_encode(['mode' => $mode,'paytm_merchant_id' => $paytm_merchant_id,'paytm_merchant_key' => $paytm_merchant_key]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

    public function cashfree(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'gateway_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule,$messages = ['required' => 'The :attribute field is required.',
]);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

        $ad_obj = PaymentGateway::findOrFail($inputs['id']);

          $mode= $inputs['mode'];
          $cashfree_appid= $inputs['cashfree_appid'];
          $cashfree_secret_key= $inputs['cashfree_secret_key'];

          $gateway_data=json_encode(['mode' => $mode,'cashfree_appid' => $cashfree_appid,'cashfree_secret_key' => $cashfree_secret_key]);  
 
          $ad_obj->gateway_name = addslashes($inputs['gateway_name']); 
          $ad_obj->gateway_info = $gateway_data;
          
          $ad_obj->status = $inputs['status'];   
          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }
      
}
