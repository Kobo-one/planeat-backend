<?php

namespace App\Http\Controllers\Child;

use App\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HeroController extends Controller
{
    const PATH = 'pages/child/hero/';

    //avatars
    public function index(){
        $child = Auth::user()->currentMember();
        $equipments = Equipment::where('type','avatar')->orderBy('unlock_level')->get();
        $equipped = $child->avatar;
        $child = Auth::user()->currentMember();
        return view(self::PATH.'index',compact('child','equipments','equipped'));
    }

    //weapons
    public function weapons(){
        $child = Auth::user()->currentMember();
        $equipments = Equipment::where('type','weapon')->orderBy('unlock_level')->get();
        $equipped = $child->weapon;
        $child = Auth::user()->currentMember();
        return view(self::PATH.'index',compact('child','equipments','equipped'));
    }

    //shields
    public function shields(){
        $child = Auth::user()->currentMember();
        $equipments = Equipment::where('type','shield')->orderBy('unlock_level')->get();
        $equipped = $child->shield;
        $child = Auth::user()->currentMember();
        return view(self::PATH.'index',compact('child','equipments','equipped'));
    }

    public function store(Equipment $equipment){
        $type = Str::lower($equipment->type);
        $func = $type.'_id';
        $child = Auth::user()->currentMember();
        if($equipment->unlock_level <= $child->level){
            $child->$func = $equipment->id;
            $child->save();
        }
        return redirect()->back();

    }

}
