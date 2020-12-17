<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = '/home';
    //public function redirectTo()
    //{
    //    if (Auth::user()->role_id == 1 && Auth::user()->is_active == 0) {
    //        return 'dashboard';
    //    }
    //    if (Auth::user()->role_id == 2 && Auth::user()->is_active == 0) {
    //        return '/';
    //    } else {
    //        Auth::logout();
    //        return 'login';
    //    }
    //}

    public function authenticated()
    {
        if (Auth::user()->role_id == 1 && Auth::user()->is_active == 0) {
            return redirect('dashboard');
        } elseif (Auth::user()->role_id == 2 && Auth::user()->is_active == 0) {
            return redirect()->back();
        } else {
            Auth::logout();
            return redirect()->back()->with('status', 'Akun anda tidak aktif. Silahkan hubungi Admin kami');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
