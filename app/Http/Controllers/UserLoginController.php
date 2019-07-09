<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class UserLoginController extends Controller
{
    public function getLoginForm() {
        return view("index.login.login");
    }
    public function getRegisterForm() {
        return view("index.login.register");
    }
    public function checkLogin(Request $request ){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index.home.get');
        } else {
            return  Redirect::back()->withErrors('email or password is incorrect.');
        }
    }
    public function getLogout()
    {
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect()->route('index.login.get');
        }else{

        }

    }
}
