<?php

namespace App\Http\Controllers;

use App\Allergy;
use App\Patient;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


/**
 * Class PatientController
 * @package App\Http\Controllers
 */
class PatientController extends Controller
{
    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postUpdatePatient(Request $request)
    {
        //Validation
        $patient = Patient::find($request['id']);
        $patient->patient_nationalid = Crypt::encrypt($request['patient_nationalid']);
        $patient->patient_dob = $request['patient_dob'];
        $patient->patient_gender = $request['patient_gender'];
        $patient->patient_insurance = Crypt::encrypt($request['patient_insurance']);
        $patient->update();

        return redirect('dashboard');
    }
    
    /**
     * Find the allergies and each allergy's
     * agent of the patient's allergies
     *
     * @param Patient $patient
     * @return array
     */
    private function findAllergiesAndAgents($patient)
    {
        $allergies = $patient->allergies()->get();
        $agents = array();
        foreach ($allergies as $allergy) {
            $agent = Allergy::find($allergy->allergy_id)->allergyagent()->get()->first();
            array_push($agents, $agent);
        }
        $allergies_and_agents = [$allergies,$agents];
        return $allergies_and_agents;
    }

    /**
     * Prepares Dashboard View
     *
     * @param Request $request
     * @return View
     */
    public function getDashboard(Request $request)
    {
        $patient = Patient::where('user_id', '=', Auth::user()->id)->first();
        Session::forget('patient_id');
        Session::put('patient_id', $patient->patient_id);
        
        if (count($patient)>0)
        {
            $allergies_and_agents = $this->findAllergiesAndAgents($patient);
            $allergies = $allergies_and_agents[0];
            $agents = $allergies_and_agents[1];
        }else
            return view('503');

        # Initialize Patient Data
        $data = [
            'patient' => $patient,
            'contact' => $patient->contact()->get()->first(),
            'guardian' => $patient->guardian()->get()->first(),
            'allergies' => $allergies,
            'agents' => $agents,
            'medicals' => $patient->medicalAlerts()->get()
        ];
        return view('dashboard', $data);
    }

}