<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\SubscriptionPlan; 

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 


class SubscriptionPlanController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct();
        check_verify_purchase();	
		  
    }
    public function subscription_plan_list()    { 
        
        if(Auth::User()->usertype!="Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_title=trans('words.subscription_plan');

         
        $plan_list = SubscriptionPlan::orderBy('id')->paginate(10);

        
        return view('admin.pages.plan_list',compact('page_title','plan_list'));
    }
    
    public function addSubscriptionPlan()    { 
        
        if(Auth::User()->usertype!="Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.add_plan');
 

        return view('admin.pages.addeditplan',compact('page_title'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        if(!empty($inputs['id'])){
                
                $rule=array(
                'plan_name' => 'required',
                'plan_price' => 'required'                 
                 );
        }else
        {
            $rule=array(
                'plan_name' => 'required',
                'plan_price' => 'required'                  
                 );
        }

        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $plan_obj = SubscriptionPlan::findOrFail($inputs['id']);

        }else{

            $plan_obj = new SubscriptionPlan;

        }

         $plan_days_final=$inputs['plan_duration']*$inputs['plan_duration_type'];
         
         $plan_obj->plan_name = $inputs['plan_name'];
         $plan_obj->plan_duration = $inputs['plan_duration']; 
         $plan_obj->plan_duration_type = $inputs['plan_duration_type']; 
         $plan_obj->plan_days = $plan_days_final;           
         $plan_obj->plan_price = $inputs['plan_price']; 
         $plan_obj->status = $inputs['status']; 
         
         $plan_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editSubscriptionPlan($plan_id)    
    {     
        if(Auth::User()->usertype!="Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }  

          $page_title=trans('words.edit_plan');

          $plan_info = SubscriptionPlan::findOrFail($plan_id);
 
          return view('admin.pages.addeditplan',compact('page_title','plan_info'));
        
    }	 
    
    public function delete($plan_id)
    {
    	if(Auth::User()->usertype=="Admin")
        {
        	
            $plan_obj = SubscriptionPlan::findOrFail($plan_id);
            $plan_obj->delete();

            \Session::flash('flash_message', trans('words.delete'));
            return redirect()->back();
        }
        else
        {
            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('admin/dashboard');            
        
        }
    }

     
     
    	
}
