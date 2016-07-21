<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * @property integer patient_id
 * @property integer doctor_id
 */


class Policy extends Model
{
    protected $table = 'policies';
    protected $primaryKey = ['patient_id', 'doctor_id'];
    public $timestamps = false;


    protected $fillable = [
        'patient_id','doctor_id'
    ];

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
    public function doctors()
    {
        return $this->hasMany('App\Doctor');
    }
}
