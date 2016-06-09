<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalAlert extends Model
{
    protected $table = 'medicalAlerts';
    protected $primaryKey = 'medical_alertid';
    public $timestamps = true;

//    protected $fillable = [
//        'medical_alertid','patient_id'
//    ];

    public function patients()
    {
        return $this->belongsToMany('App\PatientToMedicalAlert','patientToMedicalAlerts','medical_alertid');
    }
}
