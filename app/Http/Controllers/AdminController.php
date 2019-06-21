<?php

namespace App\Http\Controllers;

use App\Admin;
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
}
