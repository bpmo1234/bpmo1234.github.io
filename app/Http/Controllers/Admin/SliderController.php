<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Slider; 
use App\Movies;
use App\Series;
use App\Sports;
use App\LiveTV;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;


class SliderController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct();
        check_verify_purchase(); 	
		  
    }
    public function slider_list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }

        $page_title=trans('words.slider'); 

        //$season_list = Season::orderBy('id','DESC')->paginate(10);
        $slider_list = Slider::orderBy('id','DESC')->paginate(10);        
         
        return view('admin.pages.slider_list',compact('page_title','slider_list'));
    }
    
    public function addSlider()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }

        $page_title=trans('words.add_slider');

        $movies_list = Movies::orderBy('id','DESC')->get();
        $series_list = Series::orderBy('id','DESC')->get();
        $sports_list = Sports::orderBy('id','DESC')->get();
        $live_tv_list = LiveTV::orderBy('id','DESC')->get();
 
        return view('admin.pages.addeditslider',compact('page_title','movies_list','series_list','sports_list','live_tv_list'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        if(!empty($inputs['id'])){
                
                $rule=array(
                'slider_title' => 'required'
                  );
        }else
        {
            $rule=array(
                'slider_title' => 'required',
                'slider_image' => 'required'                 
                 );
        }

        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $slider_obj = Slider::findOrFail($inputs['id']);

        }else{

            $slider_obj = new Slider;

        }

         
         $slider_obj->slider_title = addslashes($inputs['slider_title']);
         $slider_obj->slider_image = $inputs['slider_image'];
         //$slider_obj->slider_url = $inputs['slider_url']; 

         $slider_obj->slider_type=$inputs['slider_type'];

         $slider_type=$inputs['slider_type'];

          
        if($slider_type=="Movies")
        {
            $slider_obj->slider_post_id=$inputs['movie_id'];
        }
        else if($slider_type=="Shows")
        {   
            
            $slider_obj->slider_post_id=$inputs['series_id'];
        }
        else if($slider_type=="Sports")
        {
            $slider_obj->slider_post_id=$inputs['sport_id'];
        }
        else if($slider_type=="LiveTV")
        {
            $slider_obj->slider_post_id=$inputs['live_tv_id'];
        }
        else
        {
            $slider_obj->slider_post_id='';
        }

         $slider_obj->slider_display_on = implode(',',$inputs['slider_display_on']);
         
         $slider_obj->status = $inputs['status']; 
         
         $slider_obj->save();
          
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editSlider($slider_id)    
    {     
          if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }  

          $page_title=trans('words.edit_slider');

          $slider_info = Slider::findOrFail($slider_id);

          $movies_list = Movies::orderBy('id','DESC')->get();
          $series_list = Series::orderBy('id','DESC')->get();
          $sports_list = Sports::orderBy('id','DESC')->get();
          $live_tv_list = LiveTV::orderBy('id','DESC')->get();
 
          return view('admin.pages.addeditslider',compact('page_title','slider_info','movies_list','series_list','sports_list','live_tv_list'));
        
    }	 
    
    public function delete($slider_id)
    {
    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
        	
            $slider_obj = Slider::findOrFail($slider_id);
            $slider_obj->delete();

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
