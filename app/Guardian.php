<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $table = 'guardians';
    protected $primaryKey = 'guardian_id';
    public $timestamps = true;

//    protected $fillable = [
//        'guardian_id','guardianRole','guardianFirstName','guardianSurName','guardianTelephone','guardianEmail'
//    ];

//    public function __construct(Guardian $guardian){
//        $this->guardian = $guardian;
//    }
    public function patient()
    {
        return $this->belongsTo('App\Patient','guardian_id');
    }
}
