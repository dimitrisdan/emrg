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

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


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
        $log = new Logger('patient');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/patients_logs/requests.log', Logger::INFO));
        $log->info('From:' . Session::get('user_email') . '|Patient:'.Session::get('patient_id').'|UpdatePatient|Attempt');
        //Validation
        $patient = Patient::find($request['id']);
        $patient->patient_cpr = Crypt::encrypt($request['patient_cpr']);
        $patient->patient_dob = $request['patient_dob'];
        $patient->patient_gender = $request['patient_gender'];
        $patient->patient_insurance = Crypt::encrypt($request['patient_insurance']);
        $patient->update();
        $log->info('From:' . Session::get('user_email') . '|Patient:'.Session::get('patient_id').'|UpdatePatient|Updated');
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
        $log_email = Auth::user()->email;
        $log = new Logger('patient');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/patients_logs/requests.log', Logger::INFO));
        $log->info('From:' . $log_email . '|GetDashboard|Attempt');

        $patient = Patient::where('user_id', '=', Auth::user()->id)->first();
        Session::forget('patient_id');
        Session::put('patient_id', $patient->patient_id);
        $log->info('From:' . $log_email . '|Patient:'. $patient->patient_id.'|GetDashboard|PatientFound');
        if (count($patient)>0)
        {
            $allergies_and_agents = $this->findAllergiesAndAgents($patient);
            $allergies = $allergies_and_agents[0];
            $agents = $allergies_and_agents[1];
            $log->info('From:' . $log_email . '|Patient:'. $patient->patient_id.'|GetDashboard|AllergiesFound:'.count($allergies));
            
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
        $log->info('From:' . $log_email . '|Patient:'. $patient->patient_id.'|GetDashboard|DataStored');
        # Debugging
//        echo '<pre>';
//        print_r($data['patient']);
//        echo '</pre>';
        return view('dashboard', $data);
    }

}