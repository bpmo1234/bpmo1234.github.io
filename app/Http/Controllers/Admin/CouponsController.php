<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Coupons;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class CouponsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
		  
    }
    public function coupons()    { 
        
              
        $coupons = Coupons::orderBy('id','DESC')->paginate(10);
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
        
        $page_title=trans('words.coupons');
         
        return view('admin.pages.coupons',compact('coupons','page_title'));
    }
    
    public function addeditCoupons()    { 
         
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        $page_title=trans('words.add_coupon');

        return view('admin.pages.addeditCoupons',compact('page_title'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                    'coupon_code' => 'required',
                    'coupon_user_limit' => 'required',
                    'coupon_exp_date' => 'required'                
                     );

         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $coupon_obj = Coupons::findOrFail($inputs['id']);

        }else{

            $coupon_obj = new Coupons;

        }

         $coupon_obj->coupon_code = $inputs['coupon_code']; 
         $coupon_obj->coupon_plan_id = $inputs['coupon_plan_id']; 
         $coupon_obj->coupon_user_limit = $inputs['coupon_user_limit']; 
         $coupon_obj->coupon_exp_date = strtotime($inputs['coupon_exp_date']); 
         $coupon_obj->status = $inputs['status']; 
          
         $coupon_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editCoupons($coupon_id)    
    {     
    
    	  if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
        	     
          $coupon_obj = Coupons::findOrFail($coupon_id);
          
          $page_title=trans('words.edit_coupon');           

          return view('admin.pages.addeditCoupons',compact('coupon_obj','page_title'));
        
    }	 
    
    public function delete($coupon_id)
    {
    	if(Auth::User()->usertype=="Admin")
        {
        	
        $coupon_obj = Coupons::findOrFail($coupon_id);
        $coupon_obj->delete();

        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();
        }
        else
        {
            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        
        }
    }

     
     
    	
}
