<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';

    protected $fillable = ['language_name', 'status'];


	public $timestamps = false;
 
	 
	
	public static function getLanguageInfo($id,$field_name) 
    { 
		$lang_info = Language::where('status','1')->where('id',$id)->first();
		
		if($lang_info)
		{
			return  $lang_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	public static function getLanguageID($field_name) 
    { 
		$lang_info = Language::where('language_name',$field_name)->first();
		
		if($lang_info)
		{
			return  $lang_info->id;
		}
		else
		{
			return  '';
		}
	}

	
}
