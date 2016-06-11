<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Webpatser\Uuid\Uuid;



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
