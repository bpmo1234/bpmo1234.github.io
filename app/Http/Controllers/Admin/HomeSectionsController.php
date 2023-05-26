<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\HomeSections;
use App\Movies;
use App\Series;
use App\Sports;
use App\LiveTV;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;

class HomeSectionsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
 		  
    }
    public function list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.home_section');
              
        $data_list = HomeSections::orderBy('id')->paginate(10);
         
        return view('admin.pages.homesections_list',compact('page_title','data_list'));
    }
    
    public function add()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.add_section');

        $movies_list = Movies::orderBy('id','DESC')->get();
        $series_list = Series::orderBy('id','DESC')->get();
        $sports_list = Sports::orderBy('id','DESC')->get();
        $livetv_list = LiveTV::orderBy('id','DESC')->get();

        return view('admin.pages.addedithomesections',compact('page_title','movies_list','series_list','sports_list','livetv_list'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'section_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $data_obj = HomeSections::findOrFail($inputs['id']);

        }else{

            $data_obj = new HomeSections;

        }
         
         $section_slug = Str::slug($inputs['section_name'], '-');   

         $data_obj->section_name = addslashes($inputs['section_name']); 
         $data_obj->section_slug = $section_slug;
         $data_obj->post_type = $inputs['post_type'];

         if($inputs['post_type']=="Movie")
         {
            $data_obj->movie_ids = implode(',',$inputs['selected_movie']);

            $data_obj->show_ids ='';
            $data_obj->sport_ids ='';
            $data_obj->tv_ids ='';
         }

         if($inputs['post_type']=="Shows")
         {
            $data_obj->show_ids = implode(',',$inputs['selected_shows']);

            $data_obj->movie_ids ='';
            $data_obj->sport_ids ='';
            $data_obj->tv_ids ='';
         }

         if($inputs['post_type']=="Sports")
         {
            $data_obj->sport_ids = implode(',',$inputs['selected_sport']);

            $data_obj->movie_ids ='';
            $data_obj->show_ids ='';
            $data_obj->tv_ids ='';
         }

         if($inputs['post_type']=="LiveTV")
         {
            $data_obj->tv_ids = implode(',',$inputs['selected_livetv']);

            $data_obj->movie_ids ='';
            $data_obj->show_ids ='';
            $data_obj->sport_ids ='';
         }

         $data_obj->status = $inputs['status']; 
         
         $data_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function edit($id)    
    {     
            if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }  

          $page_title=trans('words.edit_section');

          $data_obj = HomeSections::findOrFail($id);  

          $movies_list = Movies::orderBy('id','DESC')->get();
          $series_list = Series::orderBy('id','DESC')->get();
          $sports_list = Sports::orderBy('id','DESC')->get();
          $livetv_list = LiveTV::orderBy('id','DESC')->get(); 

          return view('admin.pages.addedithomesections',compact('page_title','data_obj','movies_list','series_list','sports_list','livetv_list'));
        
    }	 
    
    public function delete($id)
    {
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
        	
        $data_obj = HomeSections::findOrFail($id);
        $data_obj->delete();

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
