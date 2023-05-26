<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Series;
use App\Movies;
use App\ActorDirector;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class ActorDirectorController extends Controller
{
	  
    public function actor_details($slug,$id)
    {   
    	   
       $ad_info = ActorDirector::where('id',$id)->first();   
       
       if($ad_info=='')
       {
         abort(404, 'Unauthorized action.');
       }

       $actor_id = $ad_info->id;

       $movies_list = Movies::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$actor_id',actor_id)")->orderBy('id','DESC')->get();

       $series_list = Series::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$actor_id',actor_id)")->orderBy('id','DESC')->get(); 
        
        return view('pages.actordirector.details',compact('movies_list','series_list','ad_info'));
         
    }

    public function director_details($slug,$id)
    {   
       
       $ad_info = ActorDirector::where('id',$id)->first();   
       
       if($ad_info=='')
       {
         abort(404, 'Unauthorized action.');
       }

       $director_id = $ad_info->id;

       $movies_list = Movies::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$director_id',director_id)")->orderBy('id','DESC')->get();

       $series_list = Series::where('status',1)->where('upcoming',0)->whereRaw("find_in_set('$director_id',director_id)")->orderBy('id','DESC')->get(); 
        
        return view('pages.actordirector.details',compact('movies_list','series_list','ad_info'));
         
    }  
 
}
