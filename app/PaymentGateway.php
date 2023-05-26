<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected $table = 'payment_gateway';

    protected $fillable = ['gateway_name', 'gateway_info'];


	public $timestamps = false;
   
	
}
