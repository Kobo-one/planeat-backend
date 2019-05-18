<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    protected $fillable = [
        'name'
    ];

    public function ingredients()
    {
        return $this->hasManyThrough('App\Ingredient','App\AllergyIngredient');
    }

}
