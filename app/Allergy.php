<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer allergy_id
 * @property integer allergy_agent_id
 * @property string allergy_description
 * @property string allergy_onset
 */
class Allergy extends Model
{
    /**
     * Model Config
     */
    protected $table = 'allergys';
    protected $primaryKey = 'allergy_id';
    public $timestamps = true;
    protected $fillable = [
        'allergy_id','allergy_agent_id', 'allergy_description', 'allergy_onset',
    ];
    
    public function allergyagent()
    {
        return $this->hasOne('App\AllergyAgent','allergy_agent_id','allergy_agent_id');
    }

    public function patients()
    {
        return $this->belongsToMany('App\PatientToAllergyAlert', 'patientToAllergyAlerts','allergy_id');
    }
}
