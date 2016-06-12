<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer id
 * @property string email
 * @property string password
 */
class User extends Authenticatable
{
    protected $fillable = [
        'id', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
