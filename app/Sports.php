<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    protected $table = 'sports_videos';

    protected $fillable = ['sports_cat_id','video_title','video_slug','video_image'];


	public $timestamps = false;
 
	 
	
	public static function getSportsInfo($id,$field_name) 
    { 
		$sports_info = Sports::where('status','1')->where('id',$id)->first();
		
		if($sports_info)
		{
			return  $sports_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	
}
