<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class IndexContactController extends Controller
{
    public function getContact(){
        return view('index.contact.contact');
    }

    public function submitFeedBack(Request $request){
        Contact::create($request->all());
        echo "You feedback is submitted sucessfully!";
        //return redirect()->route('index.contact.get')->with('success','Data added successfully.');
    }

}
