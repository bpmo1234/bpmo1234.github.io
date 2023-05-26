<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveTV extends Model
{
    protected $table = 'channels_list';

    protected $fillable = ['channel_name','channel_thumb'];


	public $timestamps = false;
 
	 
	
	public static function getLiveTvInfo($id,$field_name) 
    { 
		$livetv_info = LiveTV::where('status','1')->where('id',$id)->first();
		
		if($livetv_info)
		{
			return  $livetv_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	
}
