<?php

namespace Modules\Users\Controllers;

use App\Http\Controllers\Controller;

use Auth;
use Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Users\Repositories\UsersRepository;

class SocialController extends Controller
{
    public function __construct(UsersRepository $users){
        $this->users = $users;
    }

    public function redirect($provider)
    {
		return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
            $socialUser =   Socialite::driver($provider)->stateless()->user();
            $userExist  =   $this->users->where('email',$socialUser->getEmail())->first();

    		if($userExist){
                Auth::login($userExist);
                return redirect('/home');
            }else{
                $userData = array(
                                'name'          => $socialUser->getName(),
                                'email'         => $socialUser->getEmail(),
                                'profile_photo_path'         => $socialUser->getAvatar(),
                                'provider_id'   => $socialUser->getId(),
                                'provider'      => $provider
                            );

                $user = $this->users->create($userData);
                
                if($user){
                    Auth::login($user);
                    return redirect('/home');
                }
            }
    }
}
