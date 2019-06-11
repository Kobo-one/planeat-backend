<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1)
 */
class Equipment extends Model
{
    protected $fillable = [
        'name', 'type', 'img','unlock_level'
    ];

}
