<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 */
class User extends Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = [
        'email','first_name','last_name'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
