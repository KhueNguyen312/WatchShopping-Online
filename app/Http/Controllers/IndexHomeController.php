<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Product;

class IndexHomeController extends Controller
{
    //
    public function getHome(){
        $banners = Banner::where('status',0)->get();
        $products = Product::orderBy("id","DESC")->where('status',0)->take(10)->get();
        return view('index.home.home',compact('banners','products'));
    }
}
