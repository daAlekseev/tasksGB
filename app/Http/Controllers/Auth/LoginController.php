<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use SocialiteProviders\Manager\OAuth2\User as OA;
use Illuminate\Support\Facades\Auth;
use App\Adaptors\UserAdaptor;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function socLogin($name)
    {
        if (Auth::check()) {
            return redirect()->route('news.index');
        }
        return Socialite::driver($name)->redirect();
    }

    public function socResponse(UserAdaptor $userAdaptor, $name)
    {
        //dd($name);
        if (!Auth::check()) {
            $name = ($name == 'vk')  ? 'vkontakte' : $name;
            $user = Socialite::driver($name)->user();

            $userInSystem = $userAdaptor->getUserBySocId($user, $name);
            Auth::login($userInSystem);
        }
        return redirect()->route('news.index');
    }
}
