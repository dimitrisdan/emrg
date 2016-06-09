<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientToAllergyAlert extends Model
{
    protected $table = 'patientToAllergyAlerts';
    // protected $primaryKey = 'id';
    public $timestamps = true;
    

//    protected $fillable = [
//        'id','patientId','allergyId'
//    ];
    
//    public function patients()
//    {
//        return $this->hasMany('App\Patient','');
//    }
//    public function allergies()
//    {
//        return $this->hasMany('App\Allergy');
//    }
}
