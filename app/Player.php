<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'settings_player';

    protected $fillable = ['player_style'];


	public $timestamps = false;  
	
}
