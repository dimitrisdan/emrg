<?php

namespace App\Http\Controllers;

use App\Allergy;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AllergyController extends Controller
{
    public function getDeleteAllergy($allergy_id)
    {
        $allergy = Allergy::where('allergy_id', $allergy_id)->first();
        $allergy->delete();
        return redirect()->route('allergy.delete')->with([
            'status' => 1,
            'message' => 'Successfully deleted allergy'
        ]);
    }
}
