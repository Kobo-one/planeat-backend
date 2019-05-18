<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyMemberDifficultIngredient extends Model
{
    protected $fillable = [
        'ingredient_id','times_tried','family_member_id'
    ];

    public function FamilyMember()
    {
        return $this->belongsTo('App\FamilyMember');
    }

    public function Ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }
}
