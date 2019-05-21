<?php

namespace App\Http\Controllers\Adult;

use App\FamilyPlanning;
use App\FamilyQuest;
use App\Http\Requests\StoreQuest;
use App\Http\Requests\StoreRating;
use App\Ingredient;
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
            $listItems[] = ['day'=>$day->englishDayOfWeek,'date'=>$day->toDateString(),'quests'=>$quests->where('date',$day->toDateString())->first()];
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
        $questRecipe = FamilyPlanning::where('family_id',Auth::user()->family->id)->where('date',$date)->has('quest')->first();
        //$questRecipe = FamilyPlanning::where('family_quest_id',$quest->id)->first();


        return view(self::PATH.'quests/rate',compact('children','questRecipe','date', 'quest'));
    }

    public function ratingStore(StoreRating $request,$date){
//        TODO: add table to undo ratings
        $members = Auth::user()->family->members;
        $ratings = $request->ratings;
        foreach ($ratings as $memberId => $rating){
            //TODO: check if correct equation for xp
            $xp = $rating;
            $child = $members->where('id',$memberId)->first();
            $child->xp+=$xp;
            $child->save();
            $child->checkForLevelUp();
        }
        $quest = Auth::user()->family->quests->where('date',$date)->first();
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
            $ingredients = Ingredient::all();
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
        $relations=[];
        foreach($request->recipes as $recipeId){
            $relations=[
                'family_quest_id'=> $questId,
                'recipe_id'=> $recipeId,
            ];
        }

        return redirect()->route('quests_index')->with('success','Quest has been created');
    }
}
