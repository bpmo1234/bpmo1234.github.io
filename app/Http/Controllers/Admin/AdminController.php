<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Language;
use App\Genres;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str; 

class AdminController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
 
    public function index()
    { 
        return view('admin.pages.dashboard');
    }
	
	public function profile()
    { 
        $page_title = trans('words.profile');

        return view('admin.pages.profile',compact('page_title'));
    }
    
    public function updateProfile(Request $request)
    {   
    	$id=Auth::user()->id;	 
    	$user = User::findOrFail($id);

	    $data =  \Request::except(array('_token')) ;
	    
	    $rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:255|unique:users,email,'.$id,
		        'user_image' => 'mimes:jpg,jpeg,gif,png'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all();
		
		$icon = $request->file('user_image');
		
		         
        if($icon){
            $tmpFilePath = public_path('/upload/');

            $hardPath =  Str::slug($inputs['name'], '-').'-'.md5(time());

            $img = Image::make($icon);

            $img->fit(250, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
            //$img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->user_image = $hardPath.'-b.jpg';
        }
        
		
		$user->name = $inputs['name'];          
		$user->email = $inputs['email']; 
		$user->phone = $inputs['phone'];
        
        if($inputs['password'])
        {
            $user->password = bcrypt($inputs['password']);
        }
         
	   
	    $user->save();

	    Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }
    
    public function updatePassword(Request $request)
    { 
    	 
    		//$user = User::findOrFail(Auth::user()->id);
		
		
		    $data =  \Request::except(array('_token')) ;
            $rule  =  array(
                    'password'       => 'required|confirmed',
                    'password_confirmation'       => 'required'
                ) ;
 
            $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
		
	   		/* $val=$this->validate($request, [
                    'password' => 'required|confirmed',
            ]);  */      
         
	    $credentials = $request->only('password', 'password_confirmation'
            );
            
        $user = \Auth::user();
        $user->password = bcrypt($credentials['password']);
        $user->save();

	    Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();
    }
	
    public function verify_purchase()
    { 
        $page_title = 'Verify License';

        return view('admin.pages.verify_purchase',compact('page_title'));
    } 

    public function verify_purchase_update(Request $request)
    {       

            $data =  \Request::except(array('_token')) ;
        
            $rule=array(                
                'buyer_name' => 'required',
                'purchase_code' => 'required',
                'buyer_email' => 'required'                
                 );
        
            $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
        

            $inputs = $request->all();

            
            
            $buyer_name=trim($inputs['buyer_name']);
            $purchase_code=trim($inputs['purchase_code']);
            $buyer_email=trim($inputs['buyer_email']);

            $buyer_domain_url=\URL::to('/');
            $buyer_domain_ip=\Request::server('SERVER_ADDR');


            $envato_buyer= verify_envato_purchase_code(trim($purchase_code));

            if($envato_buyer->buyer==$buyer_name)
            {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,"http://www.secureapp.viaviweb.in/verified_user.php");
                    curl_setopt($ch, CURLOPT_POST, true);                     
                    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array('envato_product_id' => $envato_buyer->item->id,'envato_buyer_name' => $buyer_name,'envato_purchase_code' => $purchase_code,'envato_purchased_status' => 1,'buyer_admin_url' => $buyer_domain_url,'package_name' => '','envato_buyer_email' => $buyer_email)));

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $server_output = curl_exec($ch);
                    curl_close ($ch);

                       
                    putPermanentEnv('BUYER_NAME', $buyer_name);
                    putPermanentEnv('BUYER_PURCHASE_CODE', $purchase_code);
                    putPermanentEnv('BUYER_EMAIL', $buyer_email);

                    Session::flash('flash_message', 'Verify success');
                    return redirect()->back();
                      
            }
            else
            {
                Session::flash('error_flash_message', 'Verify failed');
                return redirect()->back();
            }

            
    }

     
}
