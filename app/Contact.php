<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Contact contact
 */
class Contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'contact_id';
    public $timestamps = true;

//    protected $fillable = [
//        'contactId','contactStreet','contactHouseNumber','contactCity','contactPostCode','contactState','contactCountry','contactEmail','contactHPId'
//    ];


//    public function __construct(Contact $contact){
//        $this->contact = $contact;
//    }

    public function patient()
    {
        return $this->belongsTo('App\Patient','contact_id');
    }
}
