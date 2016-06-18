<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer patient_id
 * @property integer allergy_id
 */
class PatientToAllergyAlert extends Model
{
    protected $table = 'patient_allergy_alerts';
    // protected $primaryKey = 'id';
    public $timestamps = true;
    

    protected $fillable = [
        'id','patient_id','allergy_id'
    ];
    
    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
    public function allergies()
    {
        return $this->hasMany('App\Allergy');
    }
}
