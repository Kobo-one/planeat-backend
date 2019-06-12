<?php

namespace App\Http\Controllers\Child;

use App\Http\Requests\StoreQuestChoice;
use App\MemberQuest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{
    const PATH = 'pages/child/quests/';

    public function index(){
        $child = Auth::user()->currentMember();
        $memberquests = $child->quests->sortBy('date');

        return view(self::PATH.'index',compact('memberquests'));
    }


    public function show(MemberQuest $memberquest){
        $navigation = false;
        if ($memberquest->quest->status == 'created'){
            if($memberquest->quest_recipe_id){
                return view(self::PATH.'waiting',compact('memberquest'));
            }
            return view(self::PATH.'select',compact('memberquest'));
        }else if($memberquest->quest->status == 'selected'){
            $recipe = $memberquest->quest->selectedRecipe;
            return view(self::PATH.'selected',compact('memberquest','recipe'));
        }

    }

    public function store(StoreQuestChoice $request){
        $memberQuest = MemberQuest::find($request->memberQuest);

        if($memberQuest->child != Auth::user()->currentMember()){
            abort(403, 'Access denied');
        }

        $memberQuest->quest_recipe_id = $request->recipe;
        $memberQuest->save();
        $memberQuest->quest->checkVotes();

        return redirect()->route('child_quests_show',$memberQuest);

    }
}
