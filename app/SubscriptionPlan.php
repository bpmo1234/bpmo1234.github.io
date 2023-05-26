<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $table = 'subscription_plan';

    protected $fillable = ['plan_name','plan_days','plan_duration','plan_price'];


	public $timestamps = false; 
	 
	
	public static function getSubscriptionPlanInfo($id,$field_name) 
    { 
 
		$plan_info = SubscriptionPlan::where('id',$id)->first();
		
		if($plan_info)
		{
			return  $plan_info->$field_name;
		}
		else
		{
			return  '';
		}
	}


	public static function getPlanDuration($id) 
    { 
		$plan_obj = SubscriptionPlan::find($id);

		if($plan_obj->plan_duration_type==1)
		{
			$plan_duration_type='Day(s)';
		}
		else if($plan_obj->plan_duration_type==30)
		{
			$plan_duration_type='Month(s)';
		}
		else
		{
			$plan_duration_type='Year(s)';
		}

		$duration_final=$plan_obj->plan_duration.' '.$plan_duration_type; 

		return $duration_final;
	}

	
}
