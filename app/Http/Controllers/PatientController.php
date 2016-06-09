<?php

namespace App\Http\Controllers;

use App\Allergy;
use App\AllergyAgent;
use App\Guardian;
use App\Patient;
use App\Contact;

use App\Http\Requests;
use Illuminate\Http\Request;



class PatientController extends Controller
{

    public function getDashboard(Request $request)
    {
        $user_id = $request->user()->id;

        $patient = Patient::where('user_id', '=', $user_id)->get()->first();
        $contact = Contact::find($patient->contact_id);
        $guardian = Patient::find($user_id)->guardian()->get()->first();
        $allergies = Patient::find($user_id)->allergies()->get();
        $medicals = Patient::find($user_id)->medicalAlerts()->get();
        
        $agents = array();
        foreach ($allergies as $allergy){
            $agent = Allergy::find($allergy->allergy_id)->allergyagent()->get()->first();
            array_push($agents,$agent);
        }
        




        return view('dashboard', [
            'email' => $request->user()->email,
            'patient' => $patient,
            'contact' => $contact,
            'guardian' => $guardian,
            'allergies' => $allergies,
            'agents' => $agents,
            'medicals' => $medicals
        ]);
    }
}
