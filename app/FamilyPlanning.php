<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyPlanning extends Model
{
    protected $fillable = [
        'date','family_id','ingredient_id','status'
    ];

    public function quest()
    {
        return $this->belongsTo('App\FamilyQuest','family_quest_id');
    }

    public function family(){
        return $this->belongsTo('App\Family');
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
