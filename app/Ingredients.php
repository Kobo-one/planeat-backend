<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name','ingredient_type_id'
    ];

    public function recipes()
    {
        return $this->hasManyThrough('App\Recipe','App\RecipeIngredient');
    }

    public function IngredientType()
    {
        return $this->belongsTo('App\IngredientType');
    }
}
