<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Pages;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; 

use Session;

class PagesController extends Controller
{
	  
    public function get_page($slug)
    {   
    	   
       $page_info = Pages::where('page_slug',$slug)->first();   
       
       if($page_info->id==5)
       {
       		return view('pages.extra.pages_contact',compact('page_info'));
       }
       else
       {
       		return view('pages.extra.pages',compact('page_info'));
       }
 
    }

    public function contact_send(Request $request)
    { 
        
        $data =  \Request::except(array('_token')) ;
        
        $inputs = $request->all();
        
        $rule=array(                
                'name' => 'required',
                'email' => 'required|email|max:200',
                'subject' => 'required',
                'message' => 'required',
                 );
        
        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
          
            $data = array(
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'phone' => $inputs['phone'],           
            'subject' => $inputs['subject'],
            'user_message' => $inputs['message'],
             );

            $subject=$inputs['subject'];
 
            try{

                \Mail::send('emails.contact', $data, function ($message) use ($subject){

                    $message->from(getcong('site_email'), getcong('site_name'));

                    $message->to(getcong('site_email'))->subject($subject);

                });

                \Session::flash('flash_message', 'Thank You. Your Message has been Submitted.');
                return \Redirect::back();
            
            }catch (\Throwable $e) {
             
                \Log::info($e->getMessage());     

                \Session::flash('error_flash_message', $e->getMessage());

                return \Redirect::back();           
            }
        

            \Session::flash('flash_message', 'Thank You. Your Message has been Submitted.');

            return \Redirect::back();

         
    }         
    
}
