<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvCategory extends Model
{
    protected $table = 'channel_category';

    protected $fillable = ['category_name','category_slug'];


	public $timestamps = false; 
	 
	
	public static function getTvCategoryInfo($id,$field_name) 
    { 
		$cat_info = TvCategory::where('status','1')->where('id',$id)->first();
		
		if($cat_info)
		{
			return  $cat_info->$field_name;
		}
		else
		{
			return  '';
		}
	}

	
}
