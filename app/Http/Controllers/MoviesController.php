<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Movies;
use App\Genres;
use App\Language; 
use App\HomeSection;
use App\RecentlyWatched;
use App\Slider;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class MoviesController extends Controller
{
	  
    public function movies()
    {   
        $slider= Slider::where('status',1)->whereRaw("find_in_set('Movies',slider_display_on)")->orderby('id','DESC')->get();
        
        $pagination_limit=18;

        if(isset($_GET['lang_id']))
        {   
            $movie_lang_id = $_GET['lang_id'];

            $movies_list = Movies::where('status',1)->where('upcoming',0)->where('movie_lang_id',$movie_lang_id)->orderBy('id','DESC')->paginate($pagination_limit);
            $movies_list->appends(\Request::only('lang_id'))->links();
        } 
        else if(isset($_GET['genre_id']))
        {   
            $movie_genre_id = $_GET['genre_id'];

            $movies_list = Movies::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$movie_genre_id',movie_genre_id)")->orderBy('id','DESC')->paginate($pagination_limit);
            $movies_list->appends(\Request::only('genre_id'))->links();
        } 
    	else if(isset($_GET['filter']))
        {
            $keyword = $_GET['filter'];  

            if($keyword=='old')
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->orderBy('id','ASC')->paginate($pagination_limit);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='alpha')
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->orderBy('video_title','ASC')->paginate($pagination_limit);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else if($keyword=='rand')
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->inRandomOrder()->paginate($pagination_limit);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            else
            {
                $movies_list = Movies::where('status',1)->where('upcoming',0)->orderBy('id','DESC')->paginate($pagination_limit);
                $movies_list->appends(\Request::only('filter'))->links();
            }
            
        }
        else
        {
            $movies_list = Movies::where('status',1)->where('upcoming',0)->orderBy('id','DESC')->paginate($pagination_limit);   
        }   
            
       return view('pages.movies.list',compact('slider','movies_list'));
         
    }
 
    public function movies_details($slug,$id)
    {
       $movies_info = Movies::where('status',1)->where('id',$id)->first();

       if($movies_info=='')
       {
         abort(404, 'Unauthorized action.');
       }

       $related_movies_list = Movies::where('status',1)->where('id','!=',$id)->where('movie_lang_id',$movies_info->movie_lang_id)->orderBy('id','DESC')->take(10)->get(); 

       return view('pages.movies.details',compact('movies_info','related_movies_list'));

    }

    public function movies_watch($slug,$id)
    {
        $movies_info = Movies::where('status',1)->where('id',$id)->first();

        if($movies_info=='')
        {
          abort(404, 'Unauthorized action.');
        }

         //Check user plan
        if($movies_info->video_access=="Paid")
        {
            if(Auth::check())
            {
                if(Auth::User()->usertype =="User")
                {   
                    $user_id=Auth::User()->id;

                    $user_info = User::findOrFail($user_id);
                    $user_plan_id=$user_info->plan_id;
                    $user_plan_exp_date=$user_info->exp_date;

                    if($user_plan_id==0 OR strtotime(date('m/d/Y'))>$user_plan_exp_date)
                    {      
                        return redirect('membership_plan');
                    }
                }
            }
            else
            {
                \Session::flash('error_flash_message', 'Access denied!');

                return redirect('login');
            }
        }

        $related_movies_list = Movies::where('status',1)->where('id','!=',$id)->where('movie_lang_id',$movies_info->movie_lang_id)->orderBy('id','DESC')->take(10)->get();

        //Recently Watched
        if(Auth::check())
        {
             $current_user_id=Auth::User()->id;
             $video_id=$movies_info->id;

             $recently_video_count = RecentlyWatched::where('video_type','Movies')->where('user_id',$current_user_id)->where('video_id',$video_id)->count();

            if($recently_video_count <=0)
            {   
                //Current user recently count
                $current_user_video_count = RecentlyWatched::where('user_id',$current_user_id)->count();

                if($current_user_video_count == 10)
                {   
                    DB::table("recently_watched")
                    ->where("user_id", "=", $current_user_id)
                    ->orderBy("id", "ASC")
                    ->take(1)
                    ->delete();

                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'Movies';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }
                else
                {
                    $video_recent_obj = new RecentlyWatched;
                    $video_recent_obj->video_type = 'Movies';
                    $video_recent_obj->user_id = $current_user_id;
                    $video_recent_obj->video_id = $video_id;
                    $video_recent_obj->save();
                }                
            }
        }

        //View Update
        $v_id=$movies_info->id;
        $video_obj = Movies::findOrFail($v_id);        
        $video_obj->increment('views');     
        $video_obj->save();

        if($movies_info->upcoming==1)
        {
            return view('pages.movies.upcoming_watch',compact('movies_info','related_movies_list'));
        }
        else
        {
            return view('pages.movies.watch',compact('movies_info','related_movies_list'));
        }
 
    }
        
            
}