<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Series;
use App\Genres;
use App\Language;
use App\ActorDirector;
use App\Episodes;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class SeriesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
		check_verify_purchase();  
    }
    public function series_list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_title=trans('words.shows_text');

        $language_list = Language::orderBy('language_name')->get();  
        
         if(isset($_GET['s']))
        {
            $keyword = $_GET['s'];  
            $series_list = Series::where("series_name", "LIKE","%$keyword%")->orderBy('series_name')->paginate(10);

            $series_list->appends(\Request::only('s'))->links();
        }    
        else if(isset($_GET['language_id']))
        {
            $language_id = $_GET['language_id'];
            $series_list = Series::where("series_lang_id", "=",$language_id)->orderBy('id','DESC')->paginate(10);

            $series_list->appends(\Request::only('language_id'))->links();
        }
        else
        {

            $series_list = Series::orderBy('id','DESC')->paginate(10);

        }
         
        return view('admin.pages.series_list',compact('page_title','series_list','language_list'));
    }
    
    public function addSeries()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_title=trans('words.add_show');

        $language_list = Language::orderBy('language_name')->get();
        $genre_list = Genres::orderBy('genre_name')->get();

        $actor_list = ActorDirector::where('ad_type','actor')->orderBy('ad_name')->get();
        $director_list = ActorDirector::where('ad_type','director')->orderBy('ad_name')->get();

        return view('admin.pages.addeditseries',compact('page_title','language_list','genre_list','actor_list','director_list'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        if(!empty($inputs['id'])){
                
                $rule=array(
                'language' => 'required',
                'series_genres' => 'required',
                'series_name' => 'required'                
                 );
        }else
        {
            $rule=array(
                'language' => 'required',
                'series_genres' => 'required',
                'series_name' => 'required',
                'series_poster' => 'required'                
                 );
        }

        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $series_obj = Series::findOrFail($inputs['id']);

        }else{

            $series_obj = new Series;

        }

         $series_slug = Str::slug($inputs['series_name'], '-');

         $series_obj->upcoming = $inputs['upcoming'];
         $series_obj->series_access = $inputs['series_access'];
         
         $series_obj->series_lang_id = $inputs['language'];
         $series_obj->series_genres = implode(',', $inputs['series_genres']);
         $series_obj->series_name = addslashes($inputs['series_name']);
         $series_obj->series_slug = $series_slug;
         $series_obj->series_info = addslashes($inputs['series_info']);
         $series_obj->series_poster = $inputs['series_poster']; 
         $series_obj->status = $inputs['status']; 

         

         if(isset($inputs['actors_id']))
         {
            $series_obj->actor_id = implode(',', $inputs['actors_id']);
         }
         else
         {
            $series_obj->actor_id = null;
         }
         
         if(isset($inputs['director_id']))
         {
            $series_obj->director_id = implode(',', $inputs['director_id']);
         }
         else
         {
            $series_obj->director_id = null;
         }

          
         $series_obj->imdb_id = $inputs['imdb_id'];
         $series_obj->imdb_rating = $inputs['imdb_rating'];
         $series_obj->imdb_votes = $inputs['imdb_votes'];

         $series_obj->content_rating = $inputs['content_rating'];

         $series_obj->seo_title = addslashes($inputs['seo_title']);  
         $series_obj->seo_description = addslashes($inputs['seo_description']);  
         $series_obj->seo_keyword = addslashes($inputs['seo_keyword']);  
         
         if(!empty($inputs['id']) AND $inputs['status']==0)
         {
            $series_id = $inputs['id'];

            $get_all_episodes = Episodes::where('episode_series_id',$series_id)->get();  
            
            foreach ($get_all_episodes as $episodes_data) 
            {
                $episode_video_id=$episodes_data->id;

                DB::table("recently_watched")
                    ->where("video_type", "=", "Episodes")
                    ->where("video_id", "=", $episode_video_id)
                    ->delete();

            }
 
         }

         $series_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editSeries($series_id)    
    {       
          if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', trans('words.access_denied'));

                return redirect('dashboard');
                
             }    

          $page_title=trans('words.edit_show');

          $series_info = Series::findOrFail($series_id);

          $language_list = Language::orderBy('language_name')->get();
          $genre_list = Genres::orderBy('genre_name')->get();   

          $actor_list = ActorDirector::where('ad_type','actor')->orderBy('ad_name')->get();
          $director_list = ActorDirector::where('ad_type','director')->orderBy('ad_name')->get();

          return view('admin.pages.addeditseries',compact('page_title','series_info','language_list','genre_list','actor_list','director_list'));
        
    }	 
    
    public function delete($series_id)
    {
    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
        	
            $series_obj = Series::findOrFail($series_id);
            $series_obj->delete();

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
