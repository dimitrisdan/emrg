<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer guardian_id
 * @property string guardian_role
 * @property string guardian_firstname
 * @property string guardian_lastname
 * @property string guardian_telephone
 * @property string guardian_email
 */
class Guardian extends Model
{
    protected $table = 'guardians';
    protected $primaryKey = 'guardian_id';
    public $timestamps = true;

    protected $fillable = [
        'guardian_id','guardian_role','guardian_firstname','guardian_lastname','guardian_telephone','guardian_email'
    ];


    public function patient()
    {
        return $this->belongsTo('App\Patient','guardian_id');
    }
}
