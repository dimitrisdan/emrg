<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer patient_id
 * @property integer contact_id
 * @property integer guardian_id
 * @property integer user_id
 * @property string patient_cpr
 * @property string patient_dob
 * @property string patient_insurance
 * @property string patient_gender
 */
class Patient extends Model
{
    /**
     * Model Config
     */
    protected $primaryKey='patient_id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'patient_id','contact_id','guardian_id','user_id','patient_cpr','patient_dob','patient_insurance','patient_gender'
    ];

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
        return $this->belongsToMany('App\Allergy', 'patient_allergy_alerts','patient_id');
    }
    public function medicalalerts()
    {
        return $this->belongsToMany('App\MedicalAlert','patient_medical_alerts','patient_id', 'medicalalert_id');
    }
}
