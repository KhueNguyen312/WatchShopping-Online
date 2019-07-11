<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function getCustomer(){
        $users = Customer::orderby('id','DESC')->get();
        return view('admin.user.manager.list_customer',compact('users'));
    }
}
