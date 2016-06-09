<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Webpatser\Uuid\Uuid;

class ContactController extends Controller
{
    public function postCreateGuardian(Request $request)
    {
        //Validation
//        $contact = new Contact();
//        $uuid = Uuid::generate();
//        $contact->contactId = $uuid;
//        $contact->contactStreet = $request['street'];
//        $contact->contactHouseNumber = $request['number'];
//        $contact->contactCity = $request['city'];
//        $contact->contactPostCode = $request['post_code'];
//        $contact->contactState = $request['state'];
//        $contact->contactCountry = $request['country'];
//        $contact->contactEmail = $request['email'];
//        $contact->contactHPId = $request['hpid'];

//        $request->patient()->contact()->save($contact);

//        return redirect()->route('dashboard');
    }
}
