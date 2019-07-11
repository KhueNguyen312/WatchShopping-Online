<?php

namespace App\Http\Controllers;

use App\Admin;
use Hash;
use Validator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function getListUser(){
        $users = Admin::orderBy("id","DESC")->get();
        return view('admin.user.manager.list',compact('users'));
    }
    public function getUserInfo($id) {
        $user = Admin::find($id);
        return view("admin.user.profile",compact('user'));
    }
    public function updateUserInfo($id,Request $request){
        $user = Admin::find($id);

        $messages = [
            'password.required' => 'Enter password.'
        ];
        $rules = [
            'password' => 'required',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ad.user.profile', [$id])
                ->withErrors($errors)
                ->withInput();
        }
        if(Hash::check($request->password,$user->password)){
            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'img' => $request->img
            ] );
            return redirect()->route('ad.user.profile',[$id])->with('success','Updated successfully.');
        }else{
            return redirect()
                ->route('ad.user.profile', [$id])
                ->withErrors(["","password not correct"]);
        }

    }
    public function getForm($id){
        return view("admin.user.manager.add");
    }
    public function addUser(Request $request){
        $messages = [
            'password.required' => 'Enter password.',
            'email.required' => 'Enter email.',
            'image.required' => 'Enter img.',
            'cpassword.required' => 'Confirm password.',
        ];
        $rules = [
            'password' => 'required',
            'img' => 'required',
            'cpassword' => 'required',
            'email' => 'required',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ad.admin.form.get', [0])
                ->withErrors($errors)
                ->withInput();
        }
        if($request->password == $request->cpassword){
            if(Admin::find($request->email) == null){
                return redirect()
                    ->route('ad.admin.form.get', [0])
                    ->withErrors(["","This email has already exists"]);
            }else{
                Admin::create([
                    'name' => $request->name,
                    'img' => $request->img,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 1,
                ]);
                return redirect()->route('ad.admin.form.get',[0])->with('success','Created successfully.');
            }
        }else{
            return redirect()
                ->route('ad.admin.form.get', [0])
                ->withErrors(["","Make sure you type again password is correct"]);
        }

    }
}
