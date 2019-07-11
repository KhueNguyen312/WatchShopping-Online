<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function contact(){
        $contact = Contact::orderBy("id","DESC")->get();
        return view('admin.contact.list',compact('contact'));
    }
    public function changeContactStatus(Request $request) {
        if ($request->ajax()) {
            $id = $request->id;
            $contact = Contact::find($id);
            $contact->status = 1;
            $contact->save();
        }
    }
}
