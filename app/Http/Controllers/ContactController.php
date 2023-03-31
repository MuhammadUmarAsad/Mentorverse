<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactDetails;
use App\Models\Contact;


class ContactController extends Controller
{
    public function view(){

        $contactDet = ContactDetails::all();
        $data = compact('contactDet');
        return view('contact')->with($data);

    }

    public function ContactInfo(Request $request)
    {
        $contact= new Contact;
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        $contact->subject = $request['subject'];
        $contact->message = $request['comment'];
        $contact->save();
        return view ('contactThanks');
    }
}
