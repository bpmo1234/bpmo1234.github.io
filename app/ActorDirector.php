<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorDirector extends Model
{
    protected $table = 'actor_director';

    protected $fillable = ['ad_name', 'ad_slug', 'ad_image'];


	public $timestamps = false;
 
	 
	
	public static function getActorDirectorInfo($id,$field_name) 
    { 
		$ad_info = ActorDirector::where('id',$id)->first();
		
		if($ad_info)
		{
			return  $ad_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	public static function getActorDirectorID($field_name) 
    { 
		$ad_info = ActorDirector::where('ad_name',$field_name)->first();
		
		if($ad_info)
		{
			return  $ad_info->id;
		}
		else
		{
			return  '';
		}
	}

	
}
