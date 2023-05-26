<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Series;
use App\Season;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeasonController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
        check_verify_purchase();
		  
    }
    public function season_list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_title=trans('words.seasons_text');

        $series_list = Series::orderBy('series_name')->get();  
        
        if(isset($_GET['s']))
        {
            $keyword = $_GET['s'];  
            //$season_list = Season::where("season_name", "LIKE","%$keyword%")->orderBy('season_name')->paginate(10);

            $season_list = DB::table('season')
                           ->join('series', 'season.series_id', '=', 'series.id')
                           ->select('season.*', 'series.series_name')
                           ->where("season_name", "LIKE","%$keyword%")
                           ->orderBy('season_name')
                           ->paginate(10);

            $season_list->appends(\Request::only('s'))->links();
        }    
        else if(isset($_GET['series_id']))
        {
            $series_id = $_GET['series_id'];
           // $season_list = Season::where("series_id", "=",$series_id)->orderBy('id','DESC')->paginate(10);

            $season_list = DB::table('season')
                           ->join('series', 'season.series_id', '=', 'series.id')
                           ->select('season.*', 'series.series_name')
                           ->where("series_id", "=",$series_id)
                           ->orderBy('id','DESC')
                           ->paginate(10);

            $season_list->appends(\Request::only('series_id'))->links();
        }
        else
        {

            //$season_list = Season::orderBy('id','DESC')->paginate(10);
            $season_list = DB::table('season')
                           ->join('series', 'season.series_id', '=', 'series.id')
                           ->select('season.*', 'series.series_name')
                           ->orderBy('id','DESC')
                           ->paginate(10);
        }
         
        return view('admin.pages.season_list',compact('page_title','season_list','series_list'));
    }
    
    public function addSeason()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }

        $page_title=trans('words.add_season');

        $series_list = Series::orderBy('series_name')->get();  

        return view('admin.pages.addeditseason',compact('page_title','series_list'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        if(!empty($inputs['id'])){
                
                $rule=array(
                'series' => 'required',
                'season_name' => 'required'
                  );
        }else
        {
            $rule=array(
                'series' => 'required',
                'season_name' => 'required',                 
                'season_poster' => 'required'                
                 );
        }

        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $season_obj = Season::findOrFail($inputs['id']);

        }else{

            $season_obj = new Season;

        }

         $season_slug = Str::slug($inputs['season_name'], '-');

         $season_obj->series_id = $inputs['series'];
         $season_obj->season_name = addslashes($inputs['season_name']);
         $season_obj->season_slug = $season_slug;
         $season_obj->season_poster = $inputs['season_poster']; 
         $season_obj->status = $inputs['status']; 

         $season_obj->trailer_url = $inputs['trailer_url'];

         $season_obj->seo_title = addslashes($inputs['seo_title']);  
         $season_obj->seo_description = addslashes($inputs['seo_description']);  
         $season_obj->seo_keyword = addslashes($inputs['seo_keyword']);  
         
         $season_obj->save();
         
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editSeason($season_id)    
    {      
          if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }  

          $page_title=trans('words.edit_season');

          $season_info = Season::findOrFail($season_id);

          $series_list = Series::orderBy('series_name')->get();    

          return view('admin.pages.addeditseason',compact('page_title','season_info','series_list'));
        
    }	 
    
    public function delete($season_id)
    {
    	if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
        	
            $season_obj = Season::findOrFail($season_id);
            $season_obj->delete();

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
