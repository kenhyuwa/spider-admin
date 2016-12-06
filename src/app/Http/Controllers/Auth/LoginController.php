<?php

namespace Ken\SpiderAdmin\App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Ken\SpiderAdmin\Config\ConfigRoutes;
use Ken\SpiderAdmin\App\Http\Controllers\Auth\AuthenticatedSpiderUsers;

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

    use AuthenticatedSpiderUsers, ConfigRoutes;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // if not logged in redirect to
    // protected $loginPath = 'spider/login';
    // after you've logged in redirect to
    // protected $redirectTo = 'spider/dashboard';
    // after you've logged out redirect to
    // protected $redirectAfterLogout = 'spider';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
