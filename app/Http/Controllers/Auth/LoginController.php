<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
         $role = auth()->user()->roles()->first()->name;
         if($role === 'SUPER_ADMIN')
             return redirect('/super-admin/dashboard');
         else  if($role === 'ADMIN')
             return redirect('/admin/dashboard');    
         else  if($role === 'MANAGER')
             return redirect('/manager/dashboard');    
         else  if($role === 'VIEWER')
             return redirect('/viewer/dashboard');
    }
}
