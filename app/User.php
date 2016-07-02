<?php

namespace App;

use Zizaco\Entrust\Traits\EntrustUserTrait;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Srmklive\Authy\Auth\TwoFactor\Authenticatable as TwoFactorAuthenticatable;
use Srmklive\Authy\Contracts\Auth\TwoFactor\Authenticatable as TwoFactorAuthenticatableContract;

/**
 * @property integer id
 * @property string authy_id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string phone_country_code
 * @property string phone_number
 * @property string password
 */
class User extends Authenticatable implements TwoFactorAuthenticatableContract
{

    use EntrustUserTrait, TwoFactorAuthenticatable; // add this trait to your user model
    /**
     * @var array
     */
    protected $fillable = [
        'email','authy_id','first_name','last_name','phone_number'
    ];

    protected $hidden = [
        'password', 'remember_token', 'two_factor_options'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
