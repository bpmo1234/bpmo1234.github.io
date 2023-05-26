<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    protected $fillable = ['page_title','page_content'];

 
	
	 public $timestamps = false;


	public static function getPageInfo($id,$field_name) 
    { 
		$page_info = Pages::where('status','1')->where('id',$id)->first();
		
		if($page_info)
		{
			return  $page_info->$field_name;
		}
		else
		{
			return  '';
		}
	}
    
}
