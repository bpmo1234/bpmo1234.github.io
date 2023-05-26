<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Episodes;
use App\Series;
use App\Season;
use App\RecentlyWatched;
use App\ActorDirector;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class EpisodesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct();
        check_verify_purchase(); 	
		  
    }
    public function episodes_list()
    { 
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }
        
        $page_title=trans('words.episodes_text');

        $series_list = Series::orderBy('series_name')->get();          
        
        if(isset($_GET['s']))
        {
            $keyword = $_GET['s'];  

            $episodes_list = DB::table('episodes')
                           ->join('series', 'episodes.episode_series_id', '=', 'series.id')
                           ->select('episodes.*', 'series.series_name')
                           ->where("episodes.video_title", "LIKE","%$keyword%")
                           ->orderBy('id','DESC')
                           ->paginate(10);
        

            $episodes_list->appends(\Request::only('s'))->links();
        }    
        else if(isset($_GET['series_id']))
        {
            $series_id = $_GET['series_id'];

            $episodes_list = DB::table('episodes')
                           ->join('series', 'episodes.episode_series_id', '=', 'series.id')
                           ->select('episodes.*', 'series.series_name')
                           ->where("episodes.episode_series_id", "=",$series_id)
                           ->orderBy('id','DESC')
                           ->paginate(10);

            $episodes_list->appends(\Request::only('series_id'))->links();
        }
        else
        {

           $episodes_list = DB::table('episodes')
                           ->join('series', 'episodes.episode_series_id', '=', 'series.id')
                           ->select('episodes.*', 'series.series_name')
                           ->orderBy('id','DESC')
                           ->paginate(10);

        }
         
        return view('admin.pages.episodes_list',compact('page_title','episodes_list','series_list'));
    }
    
    public function addEpisode()    { 
         
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }

        $page_title=trans('words.add_episode');

        $series_list = Series::orderBy('series_name')->get(); 

         
        return view('admin.pages.addeditepisode',compact('page_title','series_list'));
    }
    
    public function addnew(Request $request)
    {         
        
        $data =  \Request::except(array('_token')) ;
        
        if(!empty($inputs['id'])){
                $rule=array(
                        'series' => 'required',
                        'season' => 'required',
                        'video_title' => 'required'                
                         );
        }else
        {
            $rule=array(
                        'series' => 'required',
                        'season' => 'required',
                        'video_title' => 'required',
                        'video_image' => 'required'                
                         );
        }

         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $episode_obj = Episodes::findOrFail($inputs['id']);

        }else{

            $episode_obj = new Episodes;

        }

         $video_slug = Str::slug($inputs['video_title'], '-');         
   
         $episode_obj->video_access = $inputs['video_access'];
         $episode_obj->episode_series_id = $inputs['series'];
         $episode_obj->episode_season_id = $inputs['season'];
         $episode_obj->video_title = addslashes($inputs['video_title']);
         $episode_obj->video_slug = $video_slug;
         $episode_obj->video_description = addslashes($inputs['video_description']);

          
         $episode_obj->release_date = strtotime($inputs['release_date']);
         $episode_obj->duration = $inputs['duration'];

         $episode_obj->video_type = $inputs['video_type'];

         if(isset($inputs['video_quality']))
         {
          $episode_obj->video_quality = $inputs['video_quality'];
         }

         if($inputs['video_type']=="URL")
         {  
            $episode_obj->video_url = $inputs['video_url'];
             
            $episode_obj->video_url_480 = $inputs['video_url_480'];
            $episode_obj->video_url_720 = $inputs['video_url_720'];
            $episode_obj->video_url_1080 = $inputs['video_url_1080'];

         }
         else if($inputs['video_type']=="Embed")
         { 
            $episode_obj->video_url = $inputs['video_embed_code'];

         }
         else if($inputs['video_type']=="HLS")
         {
             
            $episode_obj->video_url = $inputs['video_url_hls'];

         } 
         else if($inputs['video_type']=="DASH")
         {
             
            $episode_obj->video_url = $inputs['video_url_dash'];

         } 
         else
         {            

            $episode_obj->video_url = $inputs['video_url_local'];

            $episode_obj->video_url_480 = $inputs['video_url_local_480'];
            $episode_obj->video_url_720 = $inputs['video_url_local_720'];
            $episode_obj->video_url_1080 = $inputs['video_url_local_1080'];

          }

        //$episode_obj->video_url = $video_url;

         $episode_obj->video_image = $inputs['video_image'];

         $episode_obj->status = $inputs['status'];  


         $episode_obj->imdb_id = $inputs['imdb_id'];
         $episode_obj->imdb_rating = $inputs['imdb_rating'];
         $episode_obj->imdb_votes = $inputs['imdb_votes'];

         if(isset($inputs['download_enable']))
         {
             $episode_obj->download_enable = $inputs['download_enable'];  
             $episode_obj->download_url = $inputs['download_url'];
         }

         if(isset($inputs['subtitle_on_off']))
         {
            $episode_obj->subtitle_on_off = $inputs['subtitle_on_off'];
         }
          
         $episode_obj->subtitle_language1 = $inputs['subtitle_language1'];  
         $episode_obj->subtitle_url1 = $inputs['subtitle_url1'];
         $episode_obj->subtitle_language2 = $inputs['subtitle_language2'];
         $episode_obj->subtitle_url2 = $inputs['subtitle_url2'];
         $episode_obj->subtitle_language3 = $inputs['subtitle_language3'];
         $episode_obj->subtitle_url3 = $inputs['subtitle_url3'];

         $episode_obj->seo_title = addslashes($inputs['seo_title']);  
         $episode_obj->seo_description = addslashes($inputs['seo_description']);  
         $episode_obj->seo_keyword = addslashes($inputs['seo_keyword']);  

         if(!empty($inputs['id']) AND $inputs['status']==0)
         {
            DB::table("recently_watched")
                    ->where("video_type", "=", "Episodes")
                    ->where("video_id", "=", $inputs['id'])
                    ->delete();
         }
         
         $episode_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editEpisode($episode_id)    
    {     
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
        }  

          $page_title=trans('words.edit_episode');

          $episode_info = Episodes::findOrFail($episode_id);

          $series_id=$episode_info->episode_series_id;
          
          $series_list = Series::orderBy('series_name')->get();
          $season_list = Season::where('series_id',$series_id)->orderBy('id','DESC')->get(); 
          
          $series_slug= Series::getSeriesInfo($series_id,'series_slug');  
 
          return view('admin.pages.addeditepisode',compact('page_title','episode_info','series_slug','series_list','season_list'));
        
    }	 
    
    public function delete($episode_id)
    {
        
    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
            $recently = RecentlyWatched::where('video_type','Episodes')->where('video_id',$episode_id)->delete();
            
        	$episode = Episodes::findOrFail($episode_id);
            $episode->delete();

            \Session::flash('flash_message', trans('words.deleted'));

            return redirect()->back();
        }
        else
        {
            \Session::flash('flash_message', trans('words.access_denied'));
            return redirect('admin/dashboard');            
        
        }
    }


    public function ajax_get_season_list($series_id)    { 
        
        //$cat_id = \Input::get('cat_id');
              
        $season_list = Season::where('series_id',$series_id)->orderBy('id','DESC')->get();
         
         
        return view('admin.pages.ajax_season_list',compact('season_list'));
    }
     
     
    	
}
