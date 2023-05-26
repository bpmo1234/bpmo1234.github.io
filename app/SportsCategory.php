<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportsCategory extends Model
{
    protected $table = 'sports_category';

    protected $fillable = ['category_name','category_slug'];


	public $timestamps = false;
 
	 
	
	public static function getSportsCategoryInfo($id,$field_name) 
    { 
		$cat_info = SportsCategory::where('status','1')->where('id',$id)->first();
		
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
