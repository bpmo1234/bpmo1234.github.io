<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Genres;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str; 


class GenresController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct();
        check_verify_purchase(); 	
		  
    }
    public function genres_list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.genres_text');
              
        $genres_list = Genres::orderBy('genre_name')->paginate(10);
         
        return view('admin.pages.genres_list',compact('page_title','genres_list'));
    }
    
    public function addGenre()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.add_genre');

        return view('admin.pages.addeditgenre',compact('page_title'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
                'genre_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $genre_obj = Genres::findOrFail($inputs['id']);

        }else{

            $genre_obj = new Genres;

        }

         $genre_slug = Str::slug($inputs['genre_name'], '-');

         $genre_obj->genre_name = addslashes($inputs['genre_name']);
         $genre_obj->genre_slug = $genre_slug;
         $genre_obj->status = $inputs['status'];  
         
         $genre_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editGenre($genre_id)    
    {     
         if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }  

          $page_title=trans('words.edit_genre');

          $genre = Genres::findOrFail($genre_id);   

          return view('admin.pages.addeditgenre',compact('page_title','genre'));
        
    }	 
    
    public function delete($genre_id)
    {
         
    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
        	
        $genre = Genres::findOrFail($genre_id);
        $genre->delete();

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
