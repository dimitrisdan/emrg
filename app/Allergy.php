<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    protected $table = 'allergys';
    protected $primaryKey = 'allergy_id';
    public $timestamps = true;


//    protected $fillable = [
//        'allergyId','allergyAgentId', 'allergyDescription', 'allergyOnsetDate',
//    ];
    
    public function allergyagent()
    {
        return $this->hasOne('App\AllergyAgent','allergy_agentid','allergy_agentid');
    }
    public function patients()
    {
        return $this->belongsToMany('App\PatientToAllergyAlert', 'patientToAllergyAlerts','allergy_id');
    }
}
