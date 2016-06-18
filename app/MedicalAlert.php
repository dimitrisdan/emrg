<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer medicalalert_id
 * @property string medicalalert_description
 */
class MedicalAlert extends Model
{
    /**
     * Model Config
     */
    protected $table = 'medical_alerts';
    protected $primaryKey = 'medicalalert_id';
    public $timestamps = true;

    protected $fillable = [
        'medicalalert_id','medicalalert_description'
    ];

    public function patients()
    {
        return $this->belongsToMany('App\PatientToMedicalAlert','patient_medical_alerts','medicalalert_id');
    }
}
