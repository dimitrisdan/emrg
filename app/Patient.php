<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property mixed patientId
 */
class Patient extends Model
{
    protected $primaryKey='patient_id';
    public $incrementing = true;
    public $timestamps = true;

//    protected $fillable = [
//        'patientId','contactId','guardianId','userId','patientNationalId','patientFirstName','patientSurName','patientDob','patientInsuranceNumber','patientGender'
//    ];

//    private $patient;
//
//    public function __construct(Patient $patient){
//        $this->patient = $patient;
//    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    public function contact()
    {
        return $this->hasOne('App\Contact','contact_id');
    }
    public function guardian()
    {
        return $this->hasOne('App\Guardian','guardian_id', 'guardian_id');
    }
    public function allergies()
    {
        return $this->belongsToMany('App\Allergy', 'patientToAllergyAlerts','patient_id');
    }
    public function medicalAlerts()
    {
        return $this->belongsToMany('App\MedicalAlert','patientToMedicalAlerts','patient_id', 'medical_alertid');
    }
    
    public function getPatientId()
    {
        return $this->patientId;
    }
}
