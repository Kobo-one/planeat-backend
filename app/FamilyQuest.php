<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyQuest extends Model
{
    protected $fillable = [
        'date','family_id','ingredient_id','status'
    ];

    public function Family()
    {
        return $this->belongsTo('App\Family');
    }

    public function Ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }
}
