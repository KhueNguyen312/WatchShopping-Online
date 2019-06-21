<?php
/**
 * Created by PhpStorm.
 * User: stari
 * Date: 4/10/2019
 * Time: 7:13 PM
 */

namespace App\Http\Controllers;
use Auth;

class AdminDashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('adminLogin');
    }
    public function index(){
        return view('admin.dashboard');
    }
}