<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Transactions;
use App\PaymentGateway;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

class TransactionsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct();
        check_verify_purchase();
		  
    }
    public function transactions_list()    { 
        
        if(Auth::User()->usertype!="Admin" AND Auth::User()->usertype!="Sub_Admin")
        {

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('dashboard');
            
         }
        
        $page_title=trans('words.transactions');
        
        if(isset($_GET['s']))
        {
            $keyword = $_GET['s'];  
            $transactions_list = Transactions::where("payment_id", "LIKE","%$keyword%")->orwhere("email", "LIKE","%$keyword%")->orderBy('id','DESC')->paginate(10);

            $transactions_list->appends(\Request::only('s'))->links();
        }
        else if(isset($_GET['gateway']))
        {
            $gateway = $_GET['gateway'];
            $transactions_list = Transactions::where("gateway", "=",$gateway)->orderBy('id','DESC')->paginate(10);

            $transactions_list->appends(\Request::only('gateway'))->links();
        }
        else if(isset($_GET['date']))
        {   
            $date_1=date($_GET['date'].' 00:00:00');
            $date_com1 = strtotime($date_1);

            $date_2=date($_GET['date'].' 23:59:59');
            $date_com2 = strtotime($date_2);

            $transactions_list = Transactions::whereBetween('date', [$date_com1, $date_com2])->orderBy('id','DESC')->paginate(10);

            $transactions_list->appends(\Request::only('date'))->links();

        }   
        else
        {   
            $transactions_list = Transactions::orderBy('id','DESC')->paginate(10);
        }
        
        $gateway_list = PaymentGateway::orderBy('id')->get();
         
        return view('admin.pages.transactions_list',compact('page_title','transactions_list','gateway_list'));
    } 
          
    public function transactions_export(Request $request)    
    {
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

          $data =  \Request::except(array('_token'));
                
          $inputs = $request->all();  

          $star_date=strtotime($inputs['start_date']);
          $end_date=strtotime($inputs['end_date']);

          return Excel::download(new TransactionsExport($star_date,$end_date), 'transactions.xlsx');

    }	
}
