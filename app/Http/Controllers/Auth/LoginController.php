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

    public function vkLogin()
    {
        if (Auth::check()) {
            return redirect()->route('news.index');
        }
        return Socialite::driver('vkontakte')->redirect();
    }

    public function vkResponse(UserAdaptor $userAdaptor)
    {
        if (!Auth::check()) {

            $user = Socialite::driver('vkontakte')->user();

            $userInSystem = $userAdaptor->getUserBySocId($user, 'vk');
            Auth::login($userInSystem);
        }
        return redirect()->route('news.index');
    }

    public function githubLogin()
    {
        if (Auth::check()) {
            return redirect()->route('news.index');
        }
        return Socialite::driver('github')->redirect();
    }

    public function githubResponse(UserAdaptor $userAdaptor)
    {
        if (!Auth::check()) {
            $user = Socialite::driver('github')->user();
            $userInSystem = $userAdaptor->getUserBySocId($user, 'github');
            Auth::login($userInSystem);
        }
        return redirect()->route('news.index');
    }
}
