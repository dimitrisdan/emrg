<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     * Deletes a Contact
     *
     * @param int $contact_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteContact($contact_id) {
        Contact::find($contact_id)->delete();

        return redirect()->route('dashboard')->with([
            'msg-status' => 2,
            'msg-message' => 'Contact deleted.'
        ]);
    }

    /**
     * Updates a Contact
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdateContact(Request $request)
    {
        //Validation
        $contact = Contact::find($request['id']);
        $contact->contact_telephone = Crypt::encrypt($request['contact_telephone']);
        $contact->contact_street = Crypt::encrypt($request['contact_street']);
        $contact->contact_number = Crypt::encrypt($request['contact_number']);
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


    /**
     * Creates a contact
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
        $contact->contact_hpid = $request['hpid'];

        $request->patient()->contact()->save($contact);

        return redirect()->route('dashboard')->with([
            'msg-status' => 1,
            'msg-message' => 'Contact saved.'
        ]);
    }
}
