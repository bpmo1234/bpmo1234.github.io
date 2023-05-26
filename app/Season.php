<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'season';

    protected $fillable = ['season_name','season_poster'];


	public $timestamps = false; 
	 
	
	public static function getSeasonInfo($id,$field_name) 
    { 
		$season_info = Season::where('status','1')->where('id',$id)->first();
		
		if($season_info)
		{
			return  $season_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	
}
