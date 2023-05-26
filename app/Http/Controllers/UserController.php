<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Slider;
use App\Series;
use App\Movies;
use App\HomeSection;
use App\SubscriptionPlan;
use App\Transactions; 
use App\Watchlist;
use App\Coupons;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str; 
use Session;


class UserController extends Controller
{
      
    public function dashboard()
    {
        if(!Auth::check())
        {

            \Session::flash('error_flash_message', trans('words.access_denied'));

            return redirect('login');
            
        }

        if(Auth::user()->usertype=='Admin' OR Auth::user()->usertype=='Sub_Admin')
        {
            return redirect('admin/dashboard'); 
        }

        $user_id=Auth::user()->id;
        $user = User::findOrFail($user_id);
 
        $transactions_list = Transactions::where('user_id',$user_id)->orderBy('id','DESC')->paginate(10);

        return view('pages.user.dashboard',compact('user','transactions_list'));
    }

    public function profile()
    { 
       
        if(!Auth::check())
        {

            \Session::flash('error_flash_message', trans('words.access_denied'));

            return redirect('login');
            
        }

        if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        { 
            return redirect('admin');            
        } 

        $user_id=Auth::user()->id;
        $user = User::findOrFail($user_id); 

        return view('pages.user.profile',compact('user'));
    } 
    

    public function editprofile(Request $request)
    { 
        
        $id=Auth::user()->id;    
        $user = User::findOrFail($id);

        $data =  \Request::except(array('_token'));
        
        $rule=array(
                'name' => 'required',
                'email' => 'required|email|max:255|unique:users,email,'.$id,
                'user_image' => 'mimes:jpg,jpeg,gif,png'
                 );
        
         $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

        $inputs = $request->all();
        
        $icon = $request->file('user_image');
        
                 
        if($icon){

            \File::delete(public_path('/upload/').$user->user_image);            

            //$tmpFilePath = public_path().'/upload/';
            $tmpFilePath = public_path('/upload/');

            $hardPath =  Str::slug($inputs['name'], '-').'-'.md5(time());

            $img = Image::make($icon);

            $img->fit(250, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
 
            $user->user_image = $hardPath.'-b.jpg';
        }
        
        
        $user->name = $inputs['name'];          
        $user->email = $inputs['email']; 
        $user->phone = $inputs['phone'];
        $user->user_address = $inputs['user_address'];
        
        if($inputs['password'])
        {
            $user->password = bcrypt($inputs['password']);
        }         
       
        $user->save();

        Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
         
         
    }

    public function phone_update(Request $request)
    {
        $id=Auth::user()->id;    
        $user = User::findOrFail($id);

        $data =  \Request::except(array('_token'));
        
        $rule=array(
                'phone' => 'required' 
                 );
        
         $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

        $inputs = $request->all();
       
        $user->phone = $inputs['phone'];        
        $user->save();

        Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }

    public function membership_plan()
    { 
       
        if(Auth::check())
       {
            if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
            { 
                return redirect('admin');            
            } 

        }

         
        $plan_list = SubscriptionPlan::where('status','1')->orderby('id')->get(); 

        return view('pages.payment.plan',compact('plan_list'));
    }

    public function payment_method($plan_id)
    { 
       
        if(!Auth::check())
        {
            \Session::flash('error_flash_message', trans('words.access_denied'));
            return redirect('login');            
        }
        if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        { 
            return redirect('admin');            
        } 

        $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();

        if(!$plan_info)
        {
            \Session::flash('flash_message', 'Select plan!');
            return redirect('membership_plan'); 
        }  

        //For free plan
        if($plan_info->plan_price <=0)
        {
            $plan_days=$plan_info->plan_days;
            $plan_amount=$plan_info->plan_price;
 
            $currency_code=getcong('currency_code')?getcong('currency_code'):'USD';

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
            $payment_trans->gateway = 'NA';
            $payment_trans->payment_amount = $plan_amount;
            $payment_trans->payment_id = '-';
            $payment_trans->date = strtotime(date('m/d/Y H:i:s'));                    
            $payment_trans->save();

            Session::flash('plan_id',Session::get('plan_id'));

            \Session::flash('success',trans('words.payment_success'));
             return redirect('dashboard');
        }

        Session::put('plan_id', $plan_id);
        Session::flash('razorpay_order_id',Session::get('razorpay_order_id'));
 
        return view('pages.payment.payment_method',compact('plan_info'));
    }
    
    public function my_watchlist()
    {
        if(!Auth::check())
        {
            \Session::flash('error_flash_message', trans('words.access_denied'));
            return redirect('login');            
        }

        $user_id = Auth::user()->id;

        if(getcong('menu_movies')==0 AND getcong('menu_shows')==0)
        {            
            $my_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','!=','Movies')->where('post_type','!=','Shows')->orderby('id','DESC')->get();
        }
        else if(getcong('menu_sports')==0 AND getcong('menu_livetv')==0)
        {            
            $my_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','!=','Sports')->where('post_type','!=','LiveTV')->orderby('id','DESC')->get();
        }
        else if(getcong('menu_sports')==0)
        {
            $my_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','!=','Sports')->orderby('id','DESC')->get();
        }   
        else if(getcong('menu_livetv')==0)
        {             
            $my_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','!=','LiveTV')->orderby('id','DESC')->get();
        }
        else if(getcong('menu_movies')==0)
        {
            $my_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','!=','Movies')->orderby('id','DESC')->get();
        }   
        else if(getcong('menu_shows')==0)
        {             
            $my_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','!=','Shows')->orderby('id','DESC')->get();
        }
        else
        {
            $my_watchlist = Watchlist::where('user_id',$user_id)->orderby('id','DESC')->get();
        }

        $movies_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','=','Movies')->orderby('id','DESC')->get();

        $shows_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','=','Shows')->orderby('id','DESC')->get();

        $sports_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','=','Sports')->orderby('id','DESC')->get();

        $livetv_watchlist = Watchlist::where('user_id',$user_id)->where('post_type','=','LiveTV')->orderby('id','DESC')->get();
             

        return view('pages.user.watchlist',compact('movies_watchlist','shows_watchlist','sports_watchlist','livetv_watchlist'));

    }

    public function watchlist_add()
    {
        if(!Auth::check())
        {
            \Session::flash('error_flash_message', trans('words.access_denied'));
            return redirect('login');            
        }

        $watch_obj = new Watchlist;

        $watch_obj->user_id = Auth::user()->id;
        $watch_obj->post_id = $_GET['post_id'];
        $watch_obj->post_type = $_GET['post_type'];
        $watch_obj->save(); 

        \Session::flash('flash_message', trans('words.add_watchlist_msg'));

        return redirect()->back();
    }

    public function watchlist_remove()
    {       
            if(!Auth::check())
            {
                \Session::flash('error_flash_message', trans('words.access_denied'));
                return redirect('login');            
            }

            $user_id = Auth::user()->id;

            $watch_obj = Watchlist::where('user_id', $user_id)->where('post_id', $_GET['post_id'])->where('post_type', $_GET['post_type'])->delete();

            \Session::flash('flash_message', trans('words.remove_watchlist_msg'));

            return redirect()->back();
    }


    public function apply_coupon_code(Request $request)
    {

        if(!Auth::check())
        {
            \Session::flash('error_flash_message', trans('words.access_denied'));
            return redirect('login');            
        }

        $data =  \Request::except(array('_token'));         
        
        $inputs = $request->all();

        $user_id=Auth::user()->id;  
        $user = User::findOrFail($user_id);
        $user_email= $user->email;

        $coupon_code=$inputs['coupon_code']; 
        $today_date=strtotime(date('m/d/Y'));

        //check already used or not
        $trans_info = Transactions::where('payment_id',$coupon_code)->where('user_id',$user_id)->first();

        //dd($trans_info);
        //exit;

        if($trans_info!="")
        {   
            \Session::flash('error', trans('words.already_used_coupon_msg'));
             return \Redirect::back();
        }

         
        $coupon_info = Coupons::where('coupon_code',$coupon_code)->first();
         
        //dd($coupon_info);exit;
       if($coupon_info)
       { 
            $coupon_exp_date=$coupon_info->coupon_exp_date;
            $coupon_status=$coupon_info->status;
            $coupon_user_limit=$coupon_info->coupon_user_limit;
            $coupon_used=$coupon_info->coupon_used;
            $coupon_plan_id=$coupon_info->coupon_plan_id;


          if($coupon_status==0)
          { 
              \Session::flash('error', trans('words.coupon_disabled_msg'));                 
               return \Redirect::back();
          }

          if($coupon_exp_date < $today_date)
          {
              \Session::flash('error', trans('words.coupon_expired_msg'));               
               return \Redirect::back();
          }

          if($coupon_user_limit <= $coupon_used)
          {
              \Session::flash('error', trans('words.coupon_limit_reached_msg'));
               return \Redirect::back();
          }

            $plan_info = SubscriptionPlan::where('id',$coupon_plan_id)->first();

            $plan_days=$plan_info->plan_days;
            $plan_amount=$plan_info->plan_price;

             
 
           $user->plan_id = $coupon_plan_id;
           $user->start_date = strtotime(date('m/d/Y')); 

           $user->exp_date = strtotime(date('m/d/Y', strtotime("+$plan_days days")));
            
           $user->plan_amount = $plan_amount;
           $user->save();

           //Add Transaction   
            $payment_trans = new Transactions;

            $payment_trans->user_id = $user_id;
            $payment_trans->email = $user_email;
            $payment_trans->plan_id = $coupon_plan_id;
            $payment_trans->gateway = 'Coupon Used';
            $payment_trans->payment_amount = '0.00';
            $payment_trans->payment_id = $coupon_code;
            $payment_trans->date = strtotime(date('m/d/Y'));
            
            $payment_trans->save();

            //Update Counpon Used
            $coupon_id=$coupon_info->id;
            $coupon_obj = Coupons::findOrFail($coupon_id);
            $coupon_obj->increment('coupon_used');                
            $coupon_obj->save();
            
          \Session::flash('error', trans('words.coupon_applied_successfully_msg'));
           return redirect('dashboard');   
        }
        else
        {
            \Session::flash('error', trans('words.coupon_wrong_msg'));            
            return \Redirect::back();
        }
    }

}
