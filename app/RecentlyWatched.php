<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class RecentlyWatched extends Model
{
    protected $table = 'recently_watched';

    protected $fillable = ['user_id','video_id'];


	public $timestamps = false;
 
	  
	 
	
}
