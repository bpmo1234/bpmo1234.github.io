<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\SportsCategory;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;

class SportsCategoryController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct();
        check_verify_purchase(); 	
		  
    }
    public function category_list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }

        $page_title=trans('words.sports_cat_text');
              
        $category_list = SportsCategory::orderBy('category_name')->paginate(10);
         
        return view('admin.pages.sports_category_list',compact('page_title','category_list'));
    }
    
    public function addCategory()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }    

        $page_title=trans('words.add_category');

        return view('admin.pages.addeditsportscategory',compact('page_title'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'category_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $cat_obj = SportsCategory::findOrFail($inputs['id']);

        }else{

            $cat_obj = new SportsCategory;

        }

         $category_slug = Str::slug($inputs['category_name'], '-');

         $cat_obj->category_name = addslashes($inputs['category_name']); 
         $cat_obj->category_slug = $category_slug; 
         $cat_obj->status = $inputs['status']; 
         
         $cat_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editCategory($cat_id)    
    {     
          if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }  

          $page_title=trans('words.edit_category');

          $cat_info = SportsCategory::findOrFail($cat_id);   

          return view('admin.pages.addeditsportscategory',compact('page_title','cat_info'));
        
    }	 
    
    public function delete($cat_id)
    {
    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
        	
        $cat_obj = SportsCategory::findOrFail($cat_id);
        $cat_obj->delete();

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
