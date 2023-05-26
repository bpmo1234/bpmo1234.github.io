<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Series;
use App\Season; 
use App\Episodes;
use App\Movies;
use App\Genres; 

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class GenresController extends Controller
{
	
	public function series_genres()
    {   
    	   
       $genres_list = Genres::where('status',1)->orderby('id')->get();           

        return view('pages.series_genres',compact('genres_list'));
         
    } 	

    public function series_by_genres($slug)
    {   
    	   
       $genres_info = Genres::where('status',1)->where('genre_slug',$slug)->first();   
       
       if($genres_info=='')
       {
         abort(404, 'Unauthorized action.');
       }

       $series_genres_id = $genres_info->id;

       if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

            if($keyword=='old')
            {
                $series_list = Series::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$series_genres_id',series_genres)")->orderBy('id','ASC')->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $series_list = Series::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$series_genres_id',series_genres)")->orderBy('series_name','ASC')->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $series_list = Series::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$series_genres_id',series_genres)")->inRandomOrder()->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $series_list = Series::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$series_genres_id',series_genres)")->orderBy('id','DESC')->paginate(12);
                $series_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {

          $series_list = Series::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$series_genres_id',series_genres)")->orderBy('id','DESC')->paginate(12);
        }
        return view('pages.series_by_genres',compact('series_list','genres_info'));
         
    }

    public function movies_genres()
    {   
    	   
       $genres_list = Genres::where('status',1)->orderby('id')->get();           

        return view('pages.movies_genres',compact('genres_list'));
         
    } 

    public function movies_by_genres($slug)
    {   
    	   
       $genres_info = Genres::where('status',1)->where('genre_slug',$slug)->first();   
       
       if($genres_info=='')
       {
         abort(404, 'Unauthorized action.');
       }

       $movie_genres_id = $genres_info->id;

        if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

            if($keyword=='old')
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$movie_genres_id',movie_genre_id)")->orderBy('id','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$movie_genres_id',movie_genre_id)")->orderBy('video_title','ASC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$movie_genres_id',movie_genre_id)")->inRandomOrder()->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$movie_genres_id',movie_genre_id)")->orderBy('id','DESC')->paginate(12);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {

         $movies_list = Movies::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$movie_genres_id',movie_genre_id)")->orderBy('id','DESC')->paginate(12);
        }

        return view('pages.movies_by_genres',compact('movies_list','genres_info'));
         
    } 


}
