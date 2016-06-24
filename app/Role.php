<?php namespace App;

use Zizaco\Entrust\EntrustRole;
/**
 * @property integer id
 * @property string name
 * @property string display_name
 * @property string description
 */
class Role extends EntrustRole
{
    /**
     * Model Config
     */
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id', 'name', 'display_name','description'
    ];
}