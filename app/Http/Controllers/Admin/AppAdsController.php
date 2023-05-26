<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\AppAds;
use App\Settings;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;

class AppAdsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
 		  
    }
    public function list()
    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title='App AdS List';
              
        $ad_list = AppAds::orderBy('id')->get();
         
        return view('admin.pages.ad.app_ads_list',compact('page_title','ad_list'));
    }
    
    public function edit($post_id)    
    {     
            if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }  

          
          $post_info = AppAds::findOrFail($post_id);  
            
          $ads_info=json_decode($post_info->ads_info);

          //echo $gateway_info->mode;
         // exit; 

          if($post_id==1)
          {
            $page_title='Admob';

            return view('admin.pages.ad.admob',compact('page_title','post_info','ads_info'));
          }
          else if($post_id==2)
          {
            $page_title='StartApp';

            return view('admin.pages.ad.startapp',compact('page_title','post_info','ads_info'));
          }
          else if($post_id==3)
          {
            $page_title='Facebook';

            return view('admin.pages.ad.facebook',compact('page_title','post_info','ads_info'));
          }
          else if($post_id==4)
          {
            $page_title='AppLovin\'s MAX';

            return view('admin.pages.ad.applovins',compact('page_title','post_info','ads_info'));
          }
          else if($post_id==5)
          {
            $page_title='Wortise';

            return view('admin.pages.ad.wortise',compact('page_title','post_info','ads_info'));
          }
           

 
    }    
    
       
    public function admob(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'ads_name' => 'required'                
                 );
        
        $validator = \Validator::make($data,$rule,$messages = ['required' => 'The :attribute field is required.',
]);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

          $ad_obj = AppAds::findOrFail($inputs['id']);

          $publisher_id= isset($inputs['publisher_id'])?$inputs['publisher_id']:'';
          
          $banner_on_off= isset($inputs['banner_on_off'])?$inputs['banner_on_off']:"0";
          $banner_id= isset($inputs['banner_id'])?$inputs['banner_id']:'';

          $interstitial_on_off= isset($inputs['interstitial_on_off'])?$inputs['interstitial_on_off']:"0";
          $interstitial_id= isset($inputs['interstitial_id'])?$inputs['interstitial_id']:'';
          $interstitial_clicks= isset($inputs['interstitial_clicks'])?$inputs['interstitial_clicks']:'5';
          
          // $native_on_off= isset($inputs['native_on_off'])?$inputs['native_on_off']:"0";
          // $native_id= isset($inputs['native_id'])?$inputs['native_id']:'';
          // $native_position= isset($inputs['native_position'])?$inputs['native_position']:'3';
          

          $ads_info=json_encode(['publisher_id' => $publisher_id,'banner_on_off' => $banner_on_off,'banner_id' => $banner_id,'interstitial_on_off' => $interstitial_on_off,'interstitial_id' => $interstitial_id,'interstitial_clicks' => $interstitial_clicks]);  
 
          $ad_obj->ads_name = addslashes($inputs['ads_name']); 
          $ad_obj->ads_info = $ads_info;
          
          if($inputs['status']==1)
          {
            $ad_obj->status = $inputs['status']; 

            //Other Ads Disable
            AppAds::where('id','!=', $inputs['id'])->update(['status' => 0]);  
          }   

          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

    public function startapp(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'ads_name' => 'required'                
                 );
        
        $validator = \Validator::make($data,$rule,$messages = ['required' => 'The :attribute field is required.',
]);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

          $ad_obj = AppAds::findOrFail($inputs['id']);

          $publisher_id= isset($inputs['publisher_id'])?$inputs['publisher_id']:'';
          
          $banner_on_off= isset($inputs['banner_on_off'])?$inputs['banner_on_off']:"0";
          $banner_id= isset($inputs['banner_id'])?$inputs['banner_id']:'';

          $interstitial_on_off= isset($inputs['interstitial_on_off'])?$inputs['interstitial_on_off']:"0";
          $interstitial_id= isset($inputs['interstitial_id'])?$inputs['interstitial_id']:'';
          $interstitial_clicks= isset($inputs['interstitial_clicks'])?$inputs['interstitial_clicks']:'5';
          
          $ads_info=json_encode(['publisher_id' => $publisher_id,'banner_on_off' => $banner_on_off,'banner_id' => $banner_id,'interstitial_on_off' => $interstitial_on_off,'interstitial_id' => $interstitial_id,'interstitial_clicks' => $interstitial_clicks]);  
 
          $ad_obj->ads_name = addslashes($inputs['ads_name']); 
          $ad_obj->ads_info = $ads_info;
          
          if($inputs['status']==1)
          {
            $ad_obj->status = $inputs['status']; 

            //Other Ads Disable
            AppAds::where('id','!=', $inputs['id'])->update(['status' => 0]);  
          }           

          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }
    
    public function facebook(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'ads_name' => 'required'                
                 );
        
        $validator = \Validator::make($data,$rule,$messages = ['required' => 'The :attribute field is required.',
]);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

          $ad_obj = AppAds::findOrFail($inputs['id']);

          $publisher_id= isset($inputs['publisher_id'])?$inputs['publisher_id']:'';
          
          $banner_on_off= isset($inputs['banner_on_off'])?$inputs['banner_on_off']:"0";
          $banner_id= isset($inputs['banner_id'])?$inputs['banner_id']:'';

          $interstitial_on_off= isset($inputs['interstitial_on_off'])?$inputs['interstitial_on_off']:"0";
          $interstitial_id= isset($inputs['interstitial_id'])?$inputs['interstitial_id']:'';
          $interstitial_clicks= isset($inputs['interstitial_clicks'])?$inputs['interstitial_clicks']:'5';
          
          $ads_info=json_encode(['publisher_id' => $publisher_id,'banner_on_off' => $banner_on_off,'banner_id' => $banner_id,'interstitial_on_off' => $interstitial_on_off,'interstitial_id' => $interstitial_id,'interstitial_clicks' => $interstitial_clicks]);  
 
          $ad_obj->ads_name = addslashes($inputs['ads_name']); 
          $ad_obj->ads_info = $ads_info;
          
          if($inputs['status']==1)
          {
            $ad_obj->status = $inputs['status']; 

            //Other Ads Disable
            AppAds::where('id','!=', $inputs['id'])->update(['status' => 0]);  
          }

          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

    public function applovins(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'ads_name' => 'required'                
                 );
        
        $validator = \Validator::make($data,$rule,$messages = ['required' => 'The :attribute field is required.',
]);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

          $ad_obj = AppAds::findOrFail($inputs['id']);

           
          $publisher_id= isset($inputs['publisher_id'])?$inputs['publisher_id']:'';
          
          $banner_on_off= isset($inputs['banner_on_off'])?$inputs['banner_on_off']:"0";
          $banner_id= isset($inputs['banner_id'])?$inputs['banner_id']:'';

          $interstitial_on_off= isset($inputs['interstitial_on_off'])?$inputs['interstitial_on_off']:"0";
          $interstitial_id= isset($inputs['interstitial_id'])?$inputs['interstitial_id']:'';
          $interstitial_clicks= isset($inputs['interstitial_clicks'])?$inputs['interstitial_clicks']:'5';
          
          $ads_info=json_encode(['publisher_id' => $publisher_id,'banner_on_off' => $banner_on_off,'banner_id' => $banner_id,'interstitial_on_off' => $interstitial_on_off,'interstitial_id' => $interstitial_id,'interstitial_clicks' => $interstitial_clicks]);  
 
          $ad_obj->ads_name = addslashes($inputs['ads_name']); 
          $ad_obj->ads_info = $ads_info;
          
          
          if($inputs['status']==1)
          {
            $ad_obj->status = $inputs['status']; 

            //Other Ads Disable
            AppAds::where('id','!=', $inputs['id'])->update(['status' => 0]);  
          }
      

          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    } 

    public function wortise(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'ads_name' => 'required'                
                 );
        
        $validator = \Validator::make($data,$rule,$messages = ['required' => 'The :attribute field is required.',
]);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();

          $ad_obj = AppAds::findOrFail($inputs['id']);

           
          $publisher_id= isset($inputs['publisher_id'])?$inputs['publisher_id']:'';
          
          $banner_on_off= isset($inputs['banner_on_off'])?$inputs['banner_on_off']:"0";
          $banner_id= isset($inputs['banner_id'])?$inputs['banner_id']:'';

          $interstitial_on_off= isset($inputs['interstitial_on_off'])?$inputs['interstitial_on_off']:"0";
          $interstitial_id= isset($inputs['interstitial_id'])?$inputs['interstitial_id']:'';
          $interstitial_clicks= isset($inputs['interstitial_clicks'])?$inputs['interstitial_clicks']:'5';
          
          $ads_info=json_encode(['publisher_id' => $publisher_id,'banner_on_off' => $banner_on_off,'banner_id' => $banner_id,'interstitial_on_off' => $interstitial_on_off,'interstitial_id' => $interstitial_id,'interstitial_clicks' => $interstitial_clicks]);  
 
          $ad_obj->ads_name = addslashes($inputs['ads_name']); 
          $ad_obj->ads_info = $ads_info;
          
          if($inputs['status']==1)
          {
            $ad_obj->status = $inputs['status']; 

            //Other Ads Disable
            AppAds::where('id','!=', $inputs['id'])->update(['status' => 0]);  
          }

          $ad_obj->save();

          \Session::flash('flash_message', trans('words.successfully_updated'));

          return \Redirect::back();
    }

}
