<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Language;
use App\Genres;
use App\Movies;
use App\Series;
use App\Sports;
use App\LiveTV;
use App\SubscriptionPlan;
use App\Transactions;
 
 
use App\Http\Requests;
use Illuminate\Http\Request;

//use GeoIP;

class DashboardController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
          
         parent::__construct();
         check_verify_purchase();
         
    }
    public function index()
    { 
            if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
            {

                \Session::flash('flash_message', 'Access denied!');

                return redirect('dashboard');
                
             }
           
            
    	    $language = Language::count();
            $genres = Genres::count();
            $movies = Movies::count();
            $series = Series::count();
            $sports = Sports::count();
            $livetv = LiveTV::count();
            $users = User::where('usertype','User')->count(); 
            $plan = SubscriptionPlan::count();
            $transactions = Transactions::count();

            //Revenue
            $start_day = date('Y-m-d 00:00:00');
            $finish_day = date('Y-m-d 23:59:59');
            $daily_amount= Transactions::whereBetween('date', array(strtotime($start_day), strtotime($finish_day)))->sum('payment_amount');

            $start_week = (date('D') != 'Mon') ? date('Y-m-d', strtotime('last Monday')) : date('Y-m-d');
            $finish_week = (date('D') != 'Sat') ? date('Y-m-d', strtotime('next Saturday')) : date('Y-m-d');
            $weekly_amount= Transactions::whereBetween('date', array(strtotime($start_week), strtotime($finish_week)))->sum('payment_amount');

            $start_month = date('Y-m-d', strtotime('first day of this month'));
            $finish_month = date('Y-m-d', strtotime('last day of this month'));             
            $monthly_amount = Transactions::whereBetween('date', array(strtotime($start_month), strtotime($finish_month)))->sum('payment_amount');

            $current_year = date('Y'); 
            $start_day_year = "January 1st, {$current_year}";
            $end_day_year = "December 31st, {$current_year}";
            $yearly_amount = Transactions::whereBetween('date', array(strtotime($start_day_year), strtotime($end_day_year)))->sum('payment_amount');

            $plan_list = SubscriptionPlan::orderBy('id')->get();

            $page_title = trans('words.dashboard_text')?trans('words.dashboard_text'):'Dashboard';
                
            return view('admin.pages.dashboard',compact('page_title','users','language','genres','movies','series','sports','livetv','transactions','daily_amount','weekly_amount','monthly_amount','yearly_amount','plan_list'));
                  
        
    }
	
	 
    	
}
