<?php

namespace App\Http\Controllers\Adult;

use App\FamilyPlanning;
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
    public function index()
    {
        return view(self::PATH.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(FamilyPlanning $familyPlanning)
    {
        //
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
