<?php

namespace App\Http\Controllers\AuthMerchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:merchant')->except('logout');
    }

    public function showLoginForm()
    {
        return view('authMerchant.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credential= [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard('merchant')->attempt($credential, $request->member)){
            return redirect()->intended(route('merchant.home'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('merchant')->logout();
        return redirect('/');
    }
}
