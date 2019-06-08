<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    protected $fillable = [
        '',
    ];

    public function FamilyQuest()
    {
        return $this->belongsTo('App\FamilyQuest');
    }

    public function Recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
