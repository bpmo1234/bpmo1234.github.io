<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSections extends Model
{
    protected $table = 'home_sections';

    protected $fillable = ['section_name','post_type'];


	public $timestamps = false; 	 
	 
}
