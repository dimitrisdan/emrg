<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * Model Config
     */
    protected $primaryKey='doctor_id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'doctor_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User','user_id');
    }
}
