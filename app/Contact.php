<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer contact_id
 * @property integer contact_telephone
 * @property string contact_street
 * @property string contact_number
 * @property string contact_city
 * @property string contact_postcode
 * @property string contact_state
 * @property string contact_country
 * @property string contact_hpid
 */
class Contact extends Model
{
    /**
     * Model Config
     */
    protected $table = 'contacts';
    protected $primaryKey = 'contact_id';
    public $timestamps = true;

    protected $fillable = [
        'contact_id','contact_telephone','contact_street','contact_number','contact_city','contact_postcode','contact_state','contact_country','contact_hpid'
    ];
    
    public function patient()
    {
        return $this->belongsTo('App\Patient','contact_id');
    }
}
