<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class FamilyMember extends Model
{
    use HasRoles;
    protected $guard_name = 'web';



    protected $fillable = [
        'name','pincode','birthday','family_id','level','xp'
    ];

    public function family()
    {
        return $this->belongsTo('App\Family');
    }

    public function difficultIngredients()
    {
        return $this->hasMany('App\FamilyMemberDifficultIngredient');
    }

    public function allergies()
    {
        return $this->hasManyThrough('App\Ingredient', 'App\FamilyMemberAllergy');
    }
}

