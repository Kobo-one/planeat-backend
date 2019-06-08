<?php

namespace App\Http\Controllers\Adult;

use App\FamilyPlanning;
use App\FamilyQuest;
use App\GroceryList;
use App\Http\Requests\StorePlanning;
use App\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlanningController extends Controller
{
    const PATH = 'pages/adult/planning/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($date = NULL)
    {
        if(!$date){
            $date = now()->toDateString();
        }
        $familyId = Auth::user()->family->id;
        $plannings = FamilyPlanning::where('family_id',$familyId)->where('date',$date)->get();
        $quests = FamilyQuest::where('family_id',$familyId)->where('date',$date)->where('status','created')->get();
        $readableDate = Carbon::parse($date)->format('jS F, Y');

        $lists = GroceryList::where('family_id',$familyId)->get();
        return view(self::PATH.'index',compact('date','readableDate','plannings','quests','lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($date = NULL)
    {
        if(!$date){
            $date = now()->toDateString();
        }
        $recipes = Recipe::all();
        $readableDate = Carbon::parse($date)->format('jS F, Y');
        return view(self::PATH.'create',compact('date','recipes','readableDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanning $request)
    {
        $data=[
            'date' => $request->date,
            'recipe_id' => $request->recipe,
            'family_id' => Auth::user()->family->id,
            ];

        $planning = FamilyPlanning::create($data);

        return redirect()->route('planning_index_date',$request->date)->with('success','Recipe added to your planning');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamilyPlanning  $familyPlanning
     * @return \Illuminate\Http\Response
     */
    public function show($date, Recipe $recipe)
    {
        return view(self::PATH.'detail', compact('recipe','date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamilyPlanning  $familyPlanning
     * @return \Illuminate\Http\Response
     */
    public function edit(FamilyPlanning $familyPlanning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamilyPlanning  $familyPlanning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilyPlanning $familyPlanning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamilyPlanning  $familyPlanning
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyPlanning $familyPlanning)
    {
        //
    }
}
