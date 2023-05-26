<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Series;

class Episodes extends Model
{
    protected $table = 'episodes';

    protected $fillable = ['video_title','video_image'];


	public $timestamps = false;
 
	 
	
	public static function getEpisodesInfo($id,$field_name) 
    { 
		$episodes_info = Episodes::where('status','1')->where('id',$id)->first();
		
		if($episodes_info)
		{
			return  $episodes_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	public static function getEpisodesShowName($e_id,$s_fieldname) 
    { 
		$episodes_info = Episodes::where('status','1')->where('id',$e_id)->first();
		
		if($episodes_info)
		{	
			$series_id=$episodes_info->episode_series_id;

			$series_info = Series::where('status','1')->where('id',$series_id)->first();

			return  $series_info->$s_fieldname;
		}
		else
		{
			return  '';
		}
	}

	
}
