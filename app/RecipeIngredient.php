<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    protected $fillable = [
        'ingredient_id','size','serving_size','recipe_id'
    ];

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

}
