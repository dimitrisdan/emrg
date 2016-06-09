<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllergyAgent extends Model
{
    protected $table = 'allergyAgents';
    protected $primaryKey = 'allergy_agentid';
    public $timestamps = true;

//    protected $fillable = [
//        'allergyAgentId','allergyAgentDescription'
//    ];
    
    public function alerts()
    {
        return $this->belongsTo('App\Allergy','allergy_agentid');
    }
}
