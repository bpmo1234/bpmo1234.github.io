<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use Session;

class FacebookController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();

            //print_r($user);
             
            $facebook_id= $user->id;
            $user_name= $user->name;
            $user_email= $user->email?$user->email:$facebook_id.'@facebook.com';
             
            $finduser = User::where('facebook_id', $facebook_id)->orwhere('email', $user_email)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/dashboard');
     
            }else{
                
                $newUser = User::create([
                    'name' => $user_name,
                    'email' => $user_email,
                    'password' => bcrypt('123456dummy')
                ]);
    
                Auth::login($newUser);

                $user_id=$newUser->id;

                $user = User::findOrFail($user_id);

                $user->facebook_id = $facebook_id;
                $user->save(); 
     
                return redirect('/dashboard');
            }
    
        } catch (Exception $e) {
            //dd($e->getMessage());

            Session::flash('login_flash_error', 'Login failed');
            return redirect('/login');
        }
    }
}
