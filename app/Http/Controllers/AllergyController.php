<?php

namespace App\Http\Controllers;

use App\Allergy;
use App\PatientToAllergyAlert;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class AllergyController extends Controller
{
    public function deleteAllergy(Request $request)
    {
        $allergy = Allergy::find($request['allergy_id']);
        $allergy->delete();

        return redirect()->route('dashboard')->with([
            'msg-status' => '2',
            'msg-message' => 'Allergy deleted.'
        ]);
    }

    /**
     * Creates an allergy record for 
     * the requested patient
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createAllergy(Request $request)
    {
        // Missing Validation
        $allergy = new Allergy();
        $allergy->allergy_agent_id = $request['allergy_agent_id'];
        $allergy->allergy_description = $request['allergy_description'];
        $allergy->allergy_onset = date("Y-m-d");
        $allergy->save();

        $alert = new PatientToAllergyAlert();
        $alert->patient_id = Session::get('patient_id');
        $alert->allergy_id = $allergy->allergy_id;
        $alert->save();

        return redirect()->route('dashboard')->with([
            'msg-status' => '1',
            'msg-message' => 'Allergy created.',
        ]);
    }
}
