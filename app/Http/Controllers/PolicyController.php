<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Policy;
use App\Http\Requests;

class PolicyController extends Controller
{
    public function getCreatePolicy($patient_id,$doctor_id)
    {
        // Missing Validation
        $policy = new Policy();
        $policy->patient_id = $patient_id;
        $policy->doctor_id = $doctor_id;
        $policy->save();
        
        return redirect()->route('dashboard')->with([
            'msg-status' => '1',
            'msg-message' => 'Policy created.',
        ]);
    }
}
