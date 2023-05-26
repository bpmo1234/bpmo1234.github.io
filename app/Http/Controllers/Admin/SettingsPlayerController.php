<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Player;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class SettingsPlayerController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');          
         
    }
    public function player_settings()
    { 
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        $page_title=trans('words.player_settings');
        
        $settings = Player::findOrFail('1');
 
        
        return view('admin.pages.player_settings',compact('page_title','settings'));
    }	 
    
    public function update_player_settings(Request $request)
    {  
    	  
    	$settings = Player::findOrFail('1');
 
	    
	    $data =  \Request::except(array('_token')) ;
	    
	      

	    $inputs = $request->all();

         
		$settings->player_style = $inputs['player_style']; 
        $settings->autoplay = $inputs['autoplay'];
        $settings->pip_mode = $inputs['pip_mode'];
        $settings->rewind_forward = $inputs['rewind_forward'];

		$settings->player_watermark = $inputs['player_watermark'];
        $settings->player_logo = $inputs['player_logo'];
        $settings->player_logo_position = $inputs['player_logo_position'];  
        $settings->player_url = $inputs['player_url'];

        $settings->player_ad_on_off = $inputs['player_ad_on_off'];
        $settings->ad_offset = $inputs['ad_offset'];
        $settings->ad_skip = $inputs['ad_skip'];
        $settings->ad_web_url = $inputs['ad_web_url'];
        $settings->ad_video_type = $inputs['ad_video_type'];

        if($inputs['ad_video_type']=="Local")
        {
            $settings->ad_video_url = $inputs['video_url_local'];
        }
        else
        {
            $settings->ad_video_url = $inputs['ad_video_url'];
        }
        
		  
	    $settings->save(); 
        
 
	    Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }
     
}
