<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer allergy_agent_id
 * @property string allergy_agent_description
 */
class AllergyAgent extends Model
{
    /**
     * Model Config
     */
    protected $table = 'allergy_agents';
    protected $primaryKey = 'allergy_agent_id';
    public $timestamps = true;

    protected $fillable = [
        'allergy_agent_id','allergy_agent_description'
    ];
    
    public function alerts()
    {
        return $this->belongsTo('App\Allergy','allergy_agent_id');
    }
}
