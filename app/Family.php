<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    public function children()
    {
        return $this->members()->whereHas('roles', function ($query) {
            $query->where('name', 'Child');
        });
    }

    public function quests(){
        return $this->hasMany('App\FamilyQuest');
    }

    public function plannings(){
        return $this->hasMany('App\FamilyPlanning');
    }

    public function todaysPlannings(){
        return $this->hasMany('App\FamilyPlanning')->where('date',now()->toDateString());
    }
}
