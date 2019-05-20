<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyQuest extends Model
{
    protected $fillable = [
        'date','family_id','ingredient_id','status'
    ];

    public function family()
    {
        return $this->belongsTo('App\Family');
    }

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }
}
