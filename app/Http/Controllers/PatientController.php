<?php

namespace App\Http\Controllers;

use App\Allergy;

use App\Patient;
use App\Doctor;
use App\User;
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
    public function getPolicies()
    {
        $log = new Logger('patient');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/patients_logs/'.Session::get('patient_id').'/requests.log', Logger::INFO));
        $log->info('From:' . Session::get('user_email') . '|Patient:'.Session::get('patient_id').'|GetPolicies');

        //Validation

        $all_doctors = Doctor::all();
        $doctors=[];

        foreach ($all_doctors as $doctor)
        {
            $user = User::find($doctor->user_id);
            $doctors[$user->email] = [
                'id' => $doctor->doctor_id,
                'name' => Crypt::decrypt($user->first_name) . ' ' .Crypt::decrypt($user->last_name),
                'profession' => $doctor->profession
            ] ;
        }
        $data = [
            'doctors' => $doctors
        ];
        
        return view('dashboard.policies',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postUpdatePatient(Request $request)
    {
        $log = new Logger('patient');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/patients_logs/'.Session::get('patient_id').'/requests.log', Logger::INFO));
        $log->info('From:' . Session::get('user_email') . '|Patient:'.Session::get('patient_id').'|UpdatePatient');
        
        $patient = Patient::find($request['id']);
        $patient->patient_cpr = Crypt::encrypt($request['patient_cpr']);
        $patient->patient_dob = $request['patient_dob'];
        $patient->patient_gender = $request['patient_gender'];
        $patient->patient_insurance = Crypt::encrypt($request['patient_insurance']);
        $patient->update();
        
        return view('dashboard');
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

        return view('dashboard', $data);
    }

}