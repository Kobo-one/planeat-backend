<?php

namespace App\Http\Controllers\Child;

use App\FamilyMemberDifficultIngredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    const PATH = 'pages/child/goals/';

    public function index(){
        $child = Auth::user()->currentMember();
        $difficultIngredients = $child->difficultIngredients->sortByDesc('updated_at');

        return view(self::PATH.'index',compact('difficultIngredients','child'));
    }

    public function collect(FamilyMemberDifficultIngredient $difficultIngredient){
        $progress = $difficultIngredient->progress();
        $child = Auth::user()->currentMember();
        $possibleXP = (10 *  $difficultIngredient->level);
        if($child != $difficultIngredient->familyMember){
            abort(403, 'Access denied');
        }
        if($progress >= 100){
            $child->xp += $possibleXP;
            $child->save();
            $difficultIngredient->level++;
            $difficultIngredient->save();
        }
        $resonse = 'Nice! Here is '.$possibleXP.' EXP!';
        return redirect()->route('child_goals_index')->with('success',$resonse);
    }

}
