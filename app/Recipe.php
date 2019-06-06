<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title','description','img','preparation_time','cooking_time_min','cooking_time_max','servings','serving_size','recipe_category_id'
    ];

    public function recipeCategory()
    {
        return $this->belongsTo('App\RecipeCategory');
    }

    public function recipeIngredients()
    {
        return $this->hasMany('App\RecipeIngredient');
    }

    public function steps()
    {
        return $this->hasMany('App\RecipeStep');
    }
}
