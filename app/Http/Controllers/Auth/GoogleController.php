<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use Session;

class GoogleController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();

            //print_r($user);
            $google_id= $user->id;
            $user_name= $user->name;
            $user_email= $user->email;
             
            $finduser = User::where('google_id', $google_id)->orwhere('email', $user_email)->first();
     
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

                $user->google_id = $google_id;
                $user->save(); 
     
                return redirect('/dashboard');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
