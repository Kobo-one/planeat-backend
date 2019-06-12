<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyQuest extends Model
{
    protected $fillable = [
        'date','family_id','ingredient_id','status'
    ];

    public function family()
    {
        return $this->belongsTo('App\Family');
    }

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }

    public function recipes(){
        return $this->belongsToMany('App\Recipe','quest_recipes');
    }

    public function questRecipes(){
        return $this->hasMany('App\QuestRecipe');
    }

    public function questMembers(){
        return $this->hasMany('App\MemberQuest');
    }

    public function selectedRecipe(){
        return $this->questRecipes->where('selected',true)->first()->recipe();
    }

    public function checkVotes(){
        $members = $this->questMembers;
        foreach ($members as $member){
            if(!$member->quest_recipe_id){
                return false;
            }
        }
        $this->chooseWinner();
    }

    public function chooseWinner(){
        $members = $this->questMembers;
        $answers = [];
        foreach ($members as $member){
            $answers[] = $member->quest_recipe_id;
        }

        $count = array_count_values($answers);
        arsort($count);
        $ranking = array_keys($count);

        $questRecipe = $this->questRecipes->find($ranking[0]);
        $questRecipe->selected = true;
        $questRecipe->save();

        $this->status = 'selected';
        $this->save();
    }
}
