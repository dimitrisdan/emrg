<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed name
 * @property mixed email
 * @property string password
 */
class User extends Authenticatable
{
    protected $fillable = [
        'id','name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'user_id');
    }
}
