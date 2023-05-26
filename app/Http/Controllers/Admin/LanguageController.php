<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Language;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;

class LanguageController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
        check_verify_purchase();
		  
    }
    public function languag_list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.language_text');
              
        $languag_list = Language::orderBy('language_name')->paginate(10);
         
        return view('admin.pages.languag_list',compact('page_title','languag_list'));
    }
    
    public function addLanguage()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.add_language');

        return view('admin.pages.addeditlanguage',compact('page_title'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'language_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $lang = Language::findOrFail($inputs['id']);

        }else{

            $lang = new Language;

        }

         $language_slug = Str::slug($inputs['language_name'], '-');

         $lang->language_name = addslashes($inputs['language_name']); 
         $lang->language_slug = $language_slug; 
         $lang->status = $inputs['status']; 
         
         $lang->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editLanguage($lang_id)    
    {     
            if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
            }  

          $page_title=trans('words.edit_language');

          $lang = Language::findOrFail($lang_id);   

          return view('admin.pages.addeditlanguage',compact('page_title','lang'));
        
    }	 
    
    public function delete($lang_id)
    {
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
        	
        $lang = Language::findOrFail($lang_id);
        $lang->delete();

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
