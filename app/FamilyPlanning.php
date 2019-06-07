<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyPlanning extends Model
{
    protected $fillable = [
        'date','family_id','recipe_id','hour'
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

    public function today(){
        return $this->where('date',now()->toDateString())->get();
    }
}
