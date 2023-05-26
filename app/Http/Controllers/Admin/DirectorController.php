<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\ActorDirector;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;

class DirectorController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
        check_verify_purchase();
		  
    }
    public function list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.directors');
              
        $list = ActorDirector::where('ad_type','director')->orderBy('id','DESC')->paginate(10);
         
        return view('admin.pages.director_list',compact('page_title','list'));
    }
    
    public function add()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.add_director');

        return view('admin.pages.addeditdirector',compact('page_title'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'director_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $ad_obj = ActorDirector::findOrFail($inputs['id']);

        }else{

            $ad_obj = new ActorDirector;

        }

         $ad_slug = Str::slug($inputs['director_name'], '-');

         $ad_obj->ad_type = 'director'; 
         $ad_obj->ad_name = addslashes($inputs['director_name']); 
         $ad_obj->ad_slug = $ad_slug; 
         $ad_obj->ad_image = $inputs['director_image'];
         
         $ad_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function edit($post_id)    
    {     
            if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }  

          $page_title=trans('words.edit_director');

          $post_info = ActorDirector::findOrFail($post_id);   

          return view('admin.pages.addeditdirector',compact('page_title','post_info'));
        
    }	 
    
    public function delete($post_id)
    {
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
        	
            $ad_obj = ActorDirector::findOrFail($post_id);
            $ad_obj->delete();

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
