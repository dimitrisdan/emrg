<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Policy;
use App\Doctor;
use App\Patient;
use App\Http\Requests;
use DB;

class PolicyController extends Controller
{
    public function getCreatePolicy($patient_id,$doctor_id)
    {
//        // Missing Validation
//        $policy = new Policy();
//        $doctor = Doctor::find($doctor_id);
//        $patient = Patient::find($patient_id)
//        $policy->patient_id = $patient;
//        $policy->doctor_id = $doctor;
//        $policy->save();
        DB::table('policies')->insert(
            ['patient_id' => $patient_id, 'doctor_id' => $doctor_id]
        );
//
        return redirect()->route('dashboard')->with([
            'msg-status' => '1',
            'msg-message' => 'Policy created.',
        ]);
    }
}
