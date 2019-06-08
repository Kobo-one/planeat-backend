<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    protected $fillable = [
        'name','family_id'
    ];

    public function family()
    {
        return $this->belongsTo('App\Family');
    }

    public function items()
    {
        return $this->hasMany('App\GroceryItems');
    }
}
