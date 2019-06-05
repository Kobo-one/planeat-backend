<?php

namespace App\Http\Controllers\Adult;

use App\FamilyPlanning;
use App\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $plannings = FamilyPlanning::where('date',$date);
        $readableDate = Carbon::parse($date)->format('jS F, Y');
        return view(self::PATH.'index',compact('date','readableDate','plannings'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamilyPlanning  $familyPlanning
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {

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
