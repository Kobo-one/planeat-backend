<?php

namespace App\Http\Controllers\Child;

use App\FamilyPlanning;
use App\FamilyQuest;
use App\GroceryList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DinnerController extends Controller
{
    const PATH = 'pages/child/dinner/';

    public function index(){
        $date = now()->toDateString();
        $familyId = Auth::user()->family->id;
        $planning = FamilyPlanning::where('family_id',$familyId)->where('date',$date)->whereNotNull('family_quest_id')->first();
        return view(self::PATH.'index',compact('planning','child'));
    }
}
