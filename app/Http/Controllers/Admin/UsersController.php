<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\SubscriptionPlan; 
use App\Transactions;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str; 

class UsersController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         check_verify_purchase();
         
    }
    public function user_list()    { 
         
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        } 

        $page_title=trans('words.users');

        if(isset($_GET['s']))
        {
            $keyword = $_GET['s'];  
            $user_list = User::where("usertype", "=","User")->where("name", "LIKE","%$keyword%")->orwhere("email", "LIKE","%$keyword%")->orderBy('id','DESC')->paginate(10);

            $user_list->appends(\Request::only('s'))->links();
        }
        else if(isset($_GET['plan_id']))
        {
            $plan_id = $_GET['plan_id'];
            $user_list = User::where("usertype", "=","User")->where("plan_id", "=",$plan_id)->orderBy('id','DESC')->paginate(10);

            $user_list->appends(\Request::only('plan_id'))->links();
        }
        else
        {
          
            $user_list = User::where('usertype', '=', 'User')->orderBy('id')->paginate(10);
        }
         
        return view('admin.pages.user_list',compact('page_title','user_list'));
    } 
     
    public function addUser()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        $page_title=trans('words.add_user');

        $plan_list = SubscriptionPlan::where('status','1')->orderby('id')->get();
          
        return view('admin.pages.addedituser',compact('page_title','plan_list'));
    }
    
    public function addnew(Request $request)
    { 
    	 
    	$data =  \Request::except(array('_token')) ;
	    
	    $inputs = $request->all();
	    
	    if(!empty($inputs['id']))
	    {
			$rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:255|unique:users,email,'.$inputs['id'],
                'user_image' => 'mimes:jpg,jpeg,gif,png',
                'exp_date' => 'required'		        
		   		 );
			
		}
		else
		{
			$rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:255|unique:users,email',
		        'password' => 'required|min:8|max:15',
                'user_image' => 'mimes:jpg,jpeg,gif,png'
		   		 );
		}
	    
	    
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	      
		if(!empty($inputs['id'])){
           
            $user = User::findOrFail($inputs['id']);

        }else{

            $user = new User;

        }
		
        $icon = $request->file('user_image');        
                 
        if($icon){
            //$tmpFilePath = 'upload/';
            $tmpFilePath = public_path('/upload/');

            $hardPath =  Str::slug($inputs['name'], '-').'-'.md5(time());

            $img = Image::make($icon);

            $img->fit(250, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
            //$img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->user_image = $hardPath.'-b.jpg';
        }  
		
        //Get Plan info 
        $plan_id=$inputs['subscription_plan'];
        $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();        
        $plan_days=$plan_info->plan_days;

		$user->name = $inputs['name'];		 
		$user->email = $inputs['email'];
        
        if($inputs['password'])
        {
            $user->password= bcrypt($inputs['password']); 
        }        
        $user->phone = $inputs['phone'];
        $user->user_address = $inputs['user_address'];

        if(empty($inputs['id']) && $inputs['exp_date']=="")
        {
            $user->exp_date = strtotime(date('m/d/Y', strtotime("+$plan_days days")));
        }
        else
        {
            $user->exp_date = strtotime($inputs['exp_date']);
        }
         

        $user->plan_id = $plan_id;
        $user->status = $inputs['status'];
	    $user->save(); 
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editUser($id)    
    {     
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }		
    	  $page_title=trans('words.edit_user');

          $user = User::findOrFail($id);

          $plan_list = SubscriptionPlan::where('status','1')->orderby('id')->get();
           
          return view('admin.pages.addedituser',compact('page_title','user','plan_list'));
        
    }	 
    
    public function delete($id)
    {
    	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
    		
        $user = User::findOrFail($id);         
		$user->delete();
		
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }    

    public function user_history($id)    
    {     
          if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }       
          $page_title=trans('words.user_history');

          $user = User::findOrFail($id);

          $user_id=$user->id;

          $transactions_list = Transactions::where('user_id',$user_id)->orderBy('id','DESC')->paginate(10);
           
           
          return view('admin.pages.user_history',compact('page_title','user','transactions_list'));
        
    }

    public function user_export()    
    {
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

          return Excel::download(new UsersExport, 'users.xlsx');

    }
    
    //Sub Admin

    public function admin_user_list()    { 
         
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        } 

        $page_title=trans('words.admin_list');

        if(isset($_GET['s']))
        {
            $keyword = $_GET['s'];  
            $user_list = User::where("usertype", "!=","User")->where('id', '!=', 1)->where("name", "LIKE","%$keyword%")->where("email", "LIKE","%$keyword%")->orderBy('id','DESC')->paginate(10);

            $user_list->appends(\Request::only('s'))->links();
        }        
        else
        {
          
            $user_list = User::where('usertype', '!=', 'User')->where('id', '!=', 1)->orderBy('id')->paginate(10);
        }
         
        return view('admin.pages.admin_user_list',compact('page_title','user_list'));
    } 

    public function admin_addUser()    { 
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }

        $page_title=trans('words.add_admin');
           
        return view('admin.pages.addeditadminuser',compact('page_title'));
    }
    
    public function admin_addnew(Request $request)
    { 
         
        $data =  \Request::except(array('_token')) ;
        
        $inputs = $request->all();
        
        if(!empty($inputs['id']))
        {
            $rule=array(
                'name' => 'required',
                'email' => 'required|email|max:255|unique:users,email,'.$inputs['id'],
                'user_image' => 'mimes:jpg,jpeg,gif,png' 
                 );
            
        }
        else
        {
            $rule=array(
                'name' => 'required',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|min:8|max:15',
                'user_image' => 'mimes:jpg,jpeg,gif,png'
                 );
        }
        
        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
          
        if(!empty($inputs['id'])){
           
            $user = User::findOrFail($inputs['id']);

        }else{

            $user = new User;

        }
        
        $icon = $request->file('user_image');        
                 
        if($icon){
            $tmpFilePath = public_path('/upload/');

            $hardPath =  Str::slug($inputs['name'], '-').'-'.md5(time());

            $img = Image::make($icon);

            $img->fit(250, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
            //$img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->user_image = $hardPath.'-b.jpg';
        }          
         

        $user->usertype = $inputs['usertype'];
        $user->name = $inputs['name'];       
        $user->email = $inputs['email'];
        
        if($inputs['password'])
        {
            $user->password= bcrypt($inputs['password']); 
        }        
        $user->phone = $inputs['phone'];
        $user->status = $inputs['status'];
        $user->save(); 
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', trans('words.successfully_updated'));

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', trans('words.added'));

            return \Redirect::back();

        }            
        
         
    }

    public function admin_editUser($id)    
    {     
          if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }       
          $page_title=trans('words.edit_admin');

          $user = User::findOrFail($id);
            
          return view('admin.pages.addeditadminuser',compact('page_title','user'));
        
    }

    public function admin_delete($id)
    {
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', trans('words.access_denied'));

            return redirect('admin/dashboard');
            
        }
        
        if($id!=1)
        {
            $user = User::findOrFail($id);         
            $user->delete();
        }   
        \Session::flash('flash_message', trans('words.deleted'));

        return redirect()->back();

    }  
   
    	
}
