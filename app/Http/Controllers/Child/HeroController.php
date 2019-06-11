<?php

namespace App\Http\Controllers\Child;

use App\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HeroController extends Controller
{
    const PATH = 'pages/child/hero/';

    //avatars
    public function index(){
        $child = Auth::user()->currentMember();
        $equipments = Equipment::where('type','avatar')->orderBy('unlock_level')->get();
        $equipped = $child->avatar();
        $child = Auth::user()->currentMember();
        return view(self::PATH.'index',compact('child','equipments','equipped'));
    }

    //weapons
    public function weapons(){
        $child = Auth::user()->currentMember();
        $equipments = Equipment::where('type','weapon')->orderBy('unlock_level')->get();
        $equipped = $child->weapon();
        $child = Auth::user()->currentMember();
        return view(self::PATH.'index',compact('child','equipments','equipped'));
    }

    //shields
    public function shields(){
        $child = Auth::user()->currentMember();
        $equipments = Equipment::where('type','shield')->orderBy('unlock_level')->get();
        $equipped = $child->shield();
        $child = Auth::user()->currentMember();
        return view(self::PATH.'index',compact('child','equipments','equipped'));
    }
}
