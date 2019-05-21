<?php

namespace App;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Spatie\Permission\Traits\HasRoles;

class FamilyMember extends Model implements
    AuthorizableContract
{
    use \Illuminate\Auth\Authenticatable, Authorizable;
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

    public function avatar(){
        return $this->belongsTo('App\Equipment','avatar_id');
    }
    public function weapon(){
        return $this->belongsTo('App\Equipment','weapon_id');
    }
    public function shield(){
        return $this->belongsTo('App\Equipment','shield_id');
    }

}

