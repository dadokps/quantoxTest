<?php

namespace App\Http\Controllers;

use Socialite;
use App\User;
use Illuminate\Support\Facades\Redirect;
class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try{
          $user = Socialite::driver('facebook')->user(); 
         // dd($user);
        }catch(Exception $e){
            
        }       
        $authUser = $this->findOrCreateUser($user);
        \Illuminate\Support\Facades\Auth::login($authUser);
        return  Redirect::to('/home');
//        echo $user->getName();
//        echo "<br />";
//        echo $user->getEmail();
//        echo "<br />";
//        echo "<img src='".$user->getAvatar()."' />";

        // $user->token;
    }
    
    public function findOrCreateUser($facebookUser) {
        $authUser = User::where('password','=', md5($facebookUser->id))->first();
        
        if($authUser){
            return $authUser;
        }
        
        return $this->createUser($facebookUser);
 
    }
    
    public function createUser($user) {
        $user1 = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => md5($user->id)
        ]);
        
        return $user1;
    }
}

