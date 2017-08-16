<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function redirectPath()
    {
        if(Auth::user()->user_type == 2){
            return 'kitchen/kitchen';
        }if(Auth::user()->user_type == 1){
            return 'admin/clients';
        }elseif(Auth::user()->user_type == 3){
            return 'cashier/cashier';
        }else{
            return '/dashboard';
        }

    }

    public function loginPage(){

    }





}
