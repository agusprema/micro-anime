<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\list_user_animes;
use Socialite;
use App\User;
use App\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        $services  = "google,facebook";
        if(in_array($service, explode(",", $services))){
            return Socialite::driver($service)->redirect();
        }else{
            return redirect('/login');
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        $services  = "google,facebook";
        if(in_array($service, explode(",", $services))){
            $user = Socialite::driver($service)->stateless()->user();

            $FindUser = User::where('email', $user->getEmail())->first();

            if($FindUser){
                Auth::login($FindUser, true);
            } else {
                $id_user = Str::random(8);

                $NewUser = User::create([
                    'id_user' => $id_user,
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'date_of_birth' => '2000-1-1',
                    'gender' => 'Male',
                    'profile_image' => 'default.jpg',
                    'thumbnail_image' => 'default.jpg',
                    'password' => Hash::make($user->getName())
                    /* 'api_token' => Str::random(80) */
                ]);

                $role = Role::select('id')->where('name', 'user')->first();

                $NewUser->roles()->attach($role);

                $list_anime = list_user_animes::create(['id_user' => $id_user,'id_animes' => Null]);

                Auth::login($NewUser, true);
            }

            return redirect('/');
        }else{
            return redirect('/login');
        }
    }
}
