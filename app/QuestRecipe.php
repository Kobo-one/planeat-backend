<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestRecipe extends Model
{
    protected $fillable = [
        'family_quest_id','recipe_id'
    ];

    public function familyQuest()
    {
        return $this->belongsTo('App\FamilyQuest');
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
