<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeStep extends Model
{
    protected $fillable = [
        'title','description','order','recipe_id'
    ];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
