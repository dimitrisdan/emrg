<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\MedicalAlert;
use App\PatientToMedicalAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MedicalAlertController extends Controller
{
    public function deleteMedicalAlert(Request $request)
    {
        $medical_alert = MedicalAlert::find($request['medicalalert_id']);
        $medical_alert->delete();

        return redirect()->route('dashboard')->with([
            'msg-status' => '2',
            'msg-message' => 'Medical Alert deleted.'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createMedicalAlert(Request $request)
    {
        // Missing Validation
        $medical_alert = new MedicalAlert();
        $medical_alert->medicalalert_description = $request['medicalalert_description'];
        $medical_alert->save();

        $alert = new PatientToMedicalAlert();
        $alert->patient_id = Session::get('patient_id');
        $alert->medicalalert_id = $medical_alert->medicalalert_id;
        $alert->save();

        return redirect()->route('dashboard')->with([
            'msg-status' => '1',
            'msg-message' => 'Medical Alert created.',
        ]);
    }
}
