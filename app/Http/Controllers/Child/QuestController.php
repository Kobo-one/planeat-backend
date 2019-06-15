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
        $memberquests = $child->quests->sortByDesc('updated_at');

        return view(self::PATH.'index',compact('memberquests'));
    }


    public function show(MemberQuest $memberquest){
        if ($memberquest->quest->status == 'created'){
            if($memberquest->quest_recipe_id){
                return view(self::PATH.'waiting',compact('memberquest'));
            }
            return view(self::PATH.'select',compact('memberquest'));
        }else if($memberquest->quest->status == 'selected'){
            $recipe = $memberquest->quest->selectedRecipe()->recipe;
            return view(self::PATH.'selected',compact('memberquest','recipe'));
        }else if($memberquest->quest->status == 'rated'){
            $recipe = $memberquest->quest->selectedRecipe()->recipe->first();
            return view(self::PATH.'rated',compact('memberquest','recipe'));
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
