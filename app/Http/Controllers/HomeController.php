<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

use App\Patient;
use App\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->user()) {
            $userId = $request->user()->id;
            echo $userId;
            // $patient = DB::table('Patient')->where('userId', $userId)->first();

            $patient = Patient::where('userId', $userId);
            echo $patient->patientFirstName;
//            $contact = Contact::where('contactId', 1);

//            print_r($patient);
//            print $contact;
//            $contact = DB::table('Contact')->where('patientId', $patient)->first();
//            $guardian = DB::table('Guardian')->where('guardianId', $patient->guardianId)->first();
//

            
//            array_push($data, $guardian);

//            print_r($data);
        }
        return view('home', ['patient' => $patient]);
    }
}
