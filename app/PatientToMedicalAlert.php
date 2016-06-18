<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer patient_id
 * @property integer medicalalert_id
 */

class PatientToMedicalAlert extends Model
{
    protected $table = 'patient_medical_alerts';
//    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = [
        'id','patient_id','medicalalert_id'
    ];

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
    public function medicalalerts()
    {
        return $this->hasMany('App\MedicalAlert');
    }
}
