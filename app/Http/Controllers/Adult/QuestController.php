<?php

namespace App\Http\Controllers\Adult;

use App\FamilyMemberDifficultIngredient;
use App\FamilyPlanning;
use App\FamilyQuest;
use App\Http\Requests\StoreQuest;
use App\Http\Requests\StoreRating;
use App\Ingredient;
use App\MemberQuest;
use App\QuestRecipe;
use App\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{
    const PATH = 'pages/adult/';

    public function index(){

        $listItems = [];
        $quests = Auth::user()->family->quests->whereBetween('date', [Carbon::now()->toDateString(), Carbon::now()->addDays(7)->endOfWeek()->toDateString()] );

        for($i = 0; $i < 7; $i++){
            $day = Carbon::now()->addDays($i);
            $listItems[] = ['day'=>$day->format('l, jS F Y'),'date'=>$day->toDateString(),'quests'=>$quests->where('date',$day->toDateString())->first()];
        }

        $quests = $quests->all();
        return view(self::PATH.'quests/index',compact('listItems','quests'));
    }

    public function rating($date){

        $members = Auth::user()->family->members;
        $children = [];
        foreach ($members as $member){
            if($member->hasrole('Child')){
                $children[] = $member;
            }
        }

        $quest = Auth::user()->family->quests->where('date',$date)->first();

        return view(self::PATH.'quests/rate',compact('children','date', 'quest'));
    }

    public function ratingStore(StoreRating $request,$date){
//        TODO: add table to undo ratings
        $members = Auth::user()->family->members;
        $ratings = $request->ratings;
        $quest = Auth::user()->family->quests->where('date',$date)->first();
        foreach ($ratings as $memberId => $rating){
            //TODO: check if correct equation for xp
            $xp = $rating + 5 ;
            $child = $members->where('id',$memberId)->first();
            $child->xp+=$xp;
            $child->save();
            $child->checkForLevelUp();
            $memberQuest=MemberQuest::where('family_quest_id',$quest->id)->where('family_member_id',$memberId)->first();
            $memberQuest->xp_gained = $xp;
            $memberQuest->save();
            if($quest->ingredient_id){
                $difficultIngredient = FamilyMemberDifficultIngredient::firstOrNew([
                    'family_member_id'=>$memberId,
                    'ingredient_id'=>$quest->ingredient_id,
                ]);
                $difficultIngredient->times_tried++;
                $difficultIngredient->save();
            }

        }

        $quest->status = 'rated';
        $quest->save();

        return redirect()->route('quest_rating',$date)->with('success','The children have received their xp!');
    }


    public function create($date,$ingredientId = null){
        if($date){
            if($ingredientId){
                $ingredient = Ingredient::find($ingredientId);
                $recipes = Recipe::whereHas('recipeIngredients', function($q) use ($ingredientId){
                    $q->where('recipe_ingredients.ingredient_id', $ingredientId);
                })->get();;
                return view(self::PATH.'quests/createStep2',compact('recipes','date', 'ingredient'));
            }
            $ingredients = Ingredient::has('recipes')->get();
            return view(self::PATH.'quests/create',compact('ingredients','date'));
        }
    }

    public function store(StoreQuest $request, $date ,$ingredientId){
        $fields=[
            'date'=>$date,
            'family_id' => Auth::user()->family->id,
            'ingredient_id' => $ingredientId,
            'status' => 'created',
        ];
        $quest = FamilyQuest::create($fields);
        $questId=$quest->id;
        $children = Auth::user()->family->children;
        foreach ($children as $child){
            $memberQuest = MemberQuest::create([
                'family_member_id'=>$child->id,
                'family_quest_id'=>$questId,
            ]);
        }

        $relations=[];
        foreach($request->recipes as $recipeId){
            $relations[]=[
                'family_quest_id'=> $questId,
                'recipe_id'=> $recipeId,
            ];
        }
        QuestRecipe::insert($relations);

        return redirect()->route('quests_index')->with('success','Quest has been created');
    }
}
