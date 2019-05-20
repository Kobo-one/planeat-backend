<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{

    protected $fillable = [
        'completed_tutorial',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function members()
    {
        return $this->hasMany('App\FamilyMember');
    }

    public function quests(){
        return $this->hasMany('App\FamilyQuest');
    }
}
