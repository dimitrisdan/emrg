<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class DoctorController extends Controller
{
    public function getDashboard()
    {
        $log_email = Auth::user()->email;
        $log_id = Auth::user()->id;
        $log = new Logger('doctors');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/doctorss_logs/'.$log_id.'/requests.log', Logger::INFO));
        $log->info('From:' . $log_email . '|GetDashboard');
        
        return view('dashboard');
    }
}
