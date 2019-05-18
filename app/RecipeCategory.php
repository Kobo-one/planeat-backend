<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function recipes()
    {
        return $this->hasMany('App\Recipe');
    }
}
