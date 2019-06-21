<?php
/**
 * Created by PhpStorm.
 * User: stari
 * Date: 4/9/2019
 * Time: 7:57 PM
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;

class AdminLoginController extends Controller
{

    public function index() {
        return view("admin.adminlogin");
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function checklogin(Request $request ){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);
//        if (count(DB::table('admin')->where(['email' => $request->email, 'password' => $request->password])->get()) > 0) {
//            $id = 1;
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('ad.dashboard');
        } else {
            return  Redirect::back()->withErrors('email or password is incorrect.');
        }
    }
    public function getLogout()
    {
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('ad.login');
        }else{

        }

    }
}