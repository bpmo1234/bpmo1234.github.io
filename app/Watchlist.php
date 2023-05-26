<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $table = 'watchlist';

    protected $fillable = ['user_id', 'post_id','post_type'];


	public $timestamps = false;  
	
}
