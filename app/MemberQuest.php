<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberQuest extends Model
{
    protected $fillable = [
        'family_member_id','family_quest_id','quest_recipe_id'
    ];


    public function child(){
        return $this->belongsTo('App\FamilyMember','family_member_id');
    }

    public function quest(){
        return $this->belongsTo('App\FamilyQuest','family_quest_id');

    }

    public function recipe()
    {
        return $this->belongsTo('App\QuestRecipe');
    }

}
