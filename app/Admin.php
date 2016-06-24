<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * Model Config
     */
    protected $primaryKey='admin_id';
    public $incrementing = true;
    protected $fillable = [
        'admin_id'
    ];

    public function user()
    {
        
        return $this->hasOne('App\User','user_id', 'id');
    }
}
