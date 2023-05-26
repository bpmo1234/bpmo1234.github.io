<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Pages;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str; 

class PagesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
          
    }

    public function pages_list()
    { 
 
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $pages_list = Pages::orderBy('id')->paginate(10);

        $page_title=trans('words.pages');
         
        return view('admin.pages.pages_list',compact('page_title','pages_list'));
    }

    public function add()    
    {     
          if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }  

          $page_title=trans('words.add_page');
         
          return view('admin.pages.addedit_page',compact('page_title'));
        
    }

    public function edit($page_id)    
    {     
          if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }  

          $page_title=trans('words.edit_page');

          $page_info = Pages::findOrFail($page_id);
        
          return view('admin.pages.addedit_page',compact('page_title','page_info'));
        
    }

    public function addnew(Request $request)
    {  
       
       $data =  \Request::except(array('_token')) ;
        
        if(!empty($inputs['id'])){
                
                $rule=array(
                'page_title' => 'required'
                  );
        }else
        {
            $rule=array(
                'page_title' => 'required',                            
                 );
        }

        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $page_obj = Pages::findOrFail($inputs['id']);

        }else{

            $page_obj = new Pages;

        }

         
        $page_slug = Str::slug($inputs['page_title'], '-');

        $page_obj->page_title = addslashes($inputs['page_title']);
        $page_obj->page_slug = $page_slug;   
        $page_obj->page_content = addslashes($inputs['page_content']);        

        $page_obj->page_order = $inputs['page_order'];
        $page_obj->status = $inputs['status']; 
         
         $page_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }               
        
        
    }

    public function delete($page_id)
    {
        if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
            if($page_id!=5)
            {
                 $page_obj = Pages::findOrFail($page_id);
                 $page_obj->delete();

                 \Session::flash('flash_message', trans('words.deleted'));
                 return redirect()->back();
            }
            else
            {
                \Session::flash('flash_message', trans('words.access_denied'));
                return redirect()->back();
            }
            
        }
        else
        {
            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('admin/dashboard');            
        
        }
    }

    public function page_details($page_slug,$page_id)
    {
        $page_info = Pages::findOrFail($page_id);

        if(Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }  

          $page_title=$page_info->page_title;

         
          return view('admin.pages.page_details',compact('page_title','page_info'));
    }
 
}
