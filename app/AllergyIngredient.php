<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllergyIngredient extends Model
{
    protected $fillable = [
        'allergy_id','ingredient_id'
    ];

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }

    public function allergy()
    {
        return $this->belongsTo('App\Allergy');
    }
}
