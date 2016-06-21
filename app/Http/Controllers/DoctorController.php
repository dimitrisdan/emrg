<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DoctorController extends Controller
{
    public function getDashboard(Request $request)
    {
        return view('dashboard');
    }
}
