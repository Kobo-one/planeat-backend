<?php

namespace App\Http\Controllers\Family;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TutorialController extends Controller
{
    const PATH = 'pages/family/tutorial/';

    public function index($id){
        return view(self::PATH.$id);
    }

    public function finish(){
        $family = Auth::user()->family;
        if(!$family->completed_tutorial){
            $family->completed_tutorial=true;
            $family->save();
        }
        return redirect()->route('home');


    }

}
