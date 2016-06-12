<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property integer patient_id
 * @property integer contact_id
 * @property integer guardian_id
 * @property integer user_id
 * @property string patient_nationalid
 * @property string patient_dob
 * @property string patient_insurance
 * @property string patient_gender
 */
class Patient extends Model
{
    protected $primaryKey='patient_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'patient_id','contact_id','guardian_id','user_id','patient_nationalid','patient_dob','patient_insurance','patient_gender'
    ];

//    private $patient;
//
//    public function __construct(Patient $patient){
//        $this->patient = $patient;
//    }

    public function user()
    {
        return $this->hasOne('App\User','user_id', 'id');
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
