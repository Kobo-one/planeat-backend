<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name','img','ingredient_type_id'
    ];

    public function recipes()
    {
        return $this->belongsToMany('App\Recipe','recipe_ingredients');
    }

    public function IngredientType()
    {
        return $this->belongsTo('App\IngredientType');
    }
}
