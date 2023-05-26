<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transaction';

    protected $fillable = ['email', 'plan_id','gateway','payment_id'];


	public $timestamps = false;
 
	  
}
