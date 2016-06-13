<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Patient;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;




class ContactController extends Controller
{
    public function getDeleteContact($contact_id)
    {
        $contact = Contact::where('contact_id', $contact_id)->first();
        $contact->delete();
        return redirect()->route('contact.delete')->with([
            'status' => 1,
            'message' => 'Successfully deleted contact'
        ]);
    }

    public function postUpdateContact(Request $request)
    {
        //Validation
        $contact = Contact::find($request['id']);
        $contact->contact_telephone = $request['contact_telephone'];
        $contact->contact_street = $request['contact_street'];
        $contact->contact_number = $request['contact_number'];
        $contact->contact_city = $request['contact_city'];
        $contact->contact_postcode = $request['contact_postcode'];
        $contact->contact_state = $request['contact_state'];
        $contact->contact_country = $request['contact_country'];
        $contact->contact_hpid = $request['contact_hpid'];
        $contact->update();

        return redirect()->route('dashboard')->with([
            'msg-status' => 1,
            'msg-message' => 'Contact updated.'
        ]);
    }
    
    
    public function postCreateContact(Request $request)
    {
        //Validation
        $contact = new Contact();
        $contact->contact_street = $request['street'];
        $contact->contact_number = $request['number'];
        $contact->contact_city = $request['city'];
        $contact->contact_postcode = $request['post_code'];
        $contact->contact_state = $request['state'];
        $contact->contact_country = $request['country'];
        $contact->contact_email = $request['email'];
        $contact->contact_hpid = $request['hpid'];

        $request->patient()->contact()->save($contact);

        return redirect()->route('dashboard');
    }
}
