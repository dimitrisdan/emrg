<?php

namespace App\Http\Controllers;

use App\Allergy;
use App\AllergyAgent;
use App\Guardian;
use App\MedicalAlert;
use App\Patient;
use App\Contact;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Exception\FatalErrorException;


class PatientController extends Controller
{

    private function initPatient($user_id)
    {
        
        $contact = new Contact();
        $contact->save();
        $guardian = new Guardian();
        $guardian->save();

        $patient = new Patient();
        $patient->user_id = $user_id;
        $patient->contact_id = $contact->contact_id; 
        $patient->guardian_id = $guardian->guardian_id;
        
        $patient->save();
        
        return $patient;
    }

    public function patientExists($user_id)
    {
        $patient = Patient::where('user_id', '=', $user_id)->get()->first();
        if(count($patient)==0)
            return false;
        elseif(count($patient)==1)
            return $patient;
    }

    public function getDashboard(Request $request)
    {
        $patient_found = $this->patientExists($request->user()->id);

        // if patient doesn't exist
        if(!$patient_found)
        {
            $patient = $this->initPatient($request->user()->id);
            
            $data = [
                'email' => $request->user()->email,
                'patient' => $patient,
                'contact' => false,
                'guardian' => false,
                'allergies' => false,
                'agents' => false,
                'medicals' => false
            ];
        }
        // if patient exists
        else
        {
            $contact = Contact::where('contact_id', '=', $patient_found->contact_id)->get()->first();
            $guardian = Guardian::where('guardian_id', '=', $patient_found->guardian_id)->get()->first();
            $allergies = $patient_found->allergies()->get();
            $medicals = $patient_found->medicalAlerts()->get();
            $agents = array();

            foreach ($allergies as $allergy){
                $agent = Allergy::find($allergy->allergy_id)->allergyagent()->get()->first();
                array_push($agents,$agent);
            }

            $data = [
                'email' => $request->user()->email,
                'patient' => $patient_found,
                'contact' => $contact,
                'guardian' => $guardian,
                'allergies' => $allergies,
                'agents' => $agents,
                'medicals' => $medicals
            ];

        }
        return view('dashboard', $data);
    }
}
