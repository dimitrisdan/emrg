<?php

namespace App\Http\Middleware;

use App\Contact;
use App\Guardian;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Closure;

/**
 * Middleware to check if the logged in user is assigned with a Patient
 *
 * Class PatientMiddleware
 * @package App\Http\Middleware
 */
class PatientMiddleware
{
    /**
     * Handle an incoming request.
     * If the user has not been assigned a Patient,
     * it creates a Patient and generates demo data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = Auth::user();

        $patient = Patient::where('user_id', '=', $user->id)->get()->first();

        if (count($patient)==0)
        {
            # Initialize Contact
            $contact = new Contact();
            $contact->contact_telephone = Crypt::encrypt('2107486811');
            $contact->contact_street = Crypt::encrypt('Eufratou');
            $contact->contact_number = Crypt::encrypt('1');
            $contact->contact_city = 'Zografou';
            $contact->contact_postcode = '15772';
            $contact->contact_state = 'Athens';
            $contact->contact_country = 'Greece';
            $contact->contact_hpid = '2222222';
            $contact->save();

            # Initialize Guardian
            $guardian = new Guardian();
            $guardian->guardian_role = 'legal';
            $guardian->guardian_firstname = Crypt::encrypt('Loukas');
            $guardian->guardian_lastname = Crypt::encrypt('Danampasis');
            $guardian->guardian_telephone = Crypt::encrypt('+306973309381');
            $guardian->guardian_email = Crypt::encrypt('ls@csl.gr');
            $guardian->save();

            # Initialize Patient
            $patient = new Patient();
            $patient->user_id = $user->id; 
            $patient->contact_id = $contact->contact_id;
            $patient->guardian_id = $guardian->guardian_id; 
            $patient->patient_nationalid = 'XXXXXXX';
            $patient->patient_insurance = '1111111';
            $patient->patient_gender = 'male';
            $patient->patient_dob = date("Y/m/d");
            $patient->save();
        }
        return $next($request);
    }
}
