<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroceryItems extends Model
{
    protected $fillable = [
        'grocery_list_id','name','size','serving_size','completed'
    ];

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }

    public function list()
    {
        return $this->belongsTo('App\GroceryList');
    }

}
