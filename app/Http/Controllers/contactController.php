<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required|min:0'
        ]);

        $contact  = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;

        $contact->message = $request->message;
        $contact->save();

     
        if($contact){
            return back()->with('Status', 'Thank you for contacting us. We will get back to you shortly.');
        }else{
            return back()->with('Status', 'Something went wrong. Please try again later.');  
        }

    }
}
