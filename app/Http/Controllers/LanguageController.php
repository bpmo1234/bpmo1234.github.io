<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Series;
use App\Season; 
use App\Episodes;
use App\Movies;
use App\Language; 

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class LanguageController extends Controller
{
	 public function series_language()
    {   
    	   
       $lang_list = Language::where('status',1)->orderby('id')->get();           

        return view('pages.series_language',compact('lang_list'));
         
    } 

    public function series_by_language($slug)
    {   
    	   
       $lang_info = Language::where('status',1)->where('language_slug',$slug)->first();   
       
       if($lang_info=='')
       {
         abort(404, 'Unauthorized action.');
       }

       $series_lang_id = $lang_info->id;

       if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

            if($keyword=='old')
            {
                $series_list = Series::where('status',1)->where('upcoming',0)->where('series_lang_id',$series_lang_id)->orderBy('id','ASC')->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $series_list = Series::where('status',1)->where('upcoming',0)->where('series_lang_id',$series_lang_id)->orderBy('series_name','ASC')->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $series_list = Series::where('status',1)->where('upcoming',0)->where('series_lang_id',$series_lang_id)->inRandomOrder()->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $series_list = Series::where('status',1)->where('upcoming',0)->where('series_lang_id',$series_lang_id)->orderBy('id','DESC')->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {
          $series_list = Series::where('status',1)->where('upcoming',0)->where('series_lang_id',$series_lang_id)->orderBy('id','DESC')->paginate(12);
        }
        
        return view('pages.series_by_language',compact('series_list','lang_info'));
         
    }  

    public function movies_language()
    {   
    	   
       $lang_list = Language::where('status',1)->orderby('id')->get();           

        return view('pages.movies_language',compact('lang_list'));
         
    } 

    public function movies_by_language($slug)
    {   
    	   
       $lang_info = Language::where('status',1)->where('language_slug',$slug)->first();   
       
       if($lang_info=='')
       {
         abort(404, 'Unauthorized action.');
       }
       
       $movie_lang_id = $lang_info->id;


       if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

            if($keyword=='old')
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->where('movie_lang_id',$movie_lang_id)->orderBy('id','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->where('movie_lang_id',$movie_lang_id)->orderBy('video_title','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->where('movie_lang_id',$movie_lang_id)->inRandomOrder()->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->where('movie_lang_id',$movie_lang_id)->orderBy('id','DESC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {

          $movies_list = Movies::where('status',1)->where('upcoming',0)->where('movie_lang_id',$movie_lang_id)->orderBy('id','DESC')->paginate(12);
        }

        return view('pages.movies_by_language',compact('movies_list','lang_info'));
         
    }  
    
}
