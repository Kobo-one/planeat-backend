<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestRecipe extends Model
{
    protected $fillable = [
        'family_quest_id','recipe_id'
    ];

    public function FamilyQuest()
    {
        return $this->belongsTo('App\FamilyQuest');
    }

    public function Recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
