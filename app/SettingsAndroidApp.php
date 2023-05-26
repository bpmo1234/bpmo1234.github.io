<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsAndroidApp extends Model
{
    protected $table = 'settings_android_app';

    protected $fillable = ['app_name','app_version', 'app_company', 'app_email', 'app_website','app_contact'];

 	
	 public $timestamps = false;
    
}
