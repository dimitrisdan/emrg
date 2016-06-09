<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientToMedicalAlert extends Model
{
    protected $table = 'patientToMedicalAlerts';
//    protected $primaryKey = 'id';
    public $timestamps = true;

    
//    protected $fillable = [
//        'id','patientId','medicalAlertId'
//    ];
//    public function patients()
//    {
//        return $this->hasMany('App\Patient');
//    }
//    public function medicalAlerts()
//    {
//        return $this->hasMany('App\MedicalAlert');
//    }
}
