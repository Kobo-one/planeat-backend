<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyMemberDifficultIngredient extends Model
{
    protected $fillable = [
        'ingredient_id','times_tried','family_member_id'
    ];

    public function familyMember()
    {
        return $this->belongsTo('App\FamilyMember');
    }

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient','ingredient_id');
    }

    public function progress(){
        $timesTried = $this->times_tried;
        $level = $this->level;
        $todo = pow (3,$level);
        return $timesTried / $todo * 100;
    }
}
