<?php

namespace App\Http\Controllers\Backend;

use App\Ingredient;
use App\IngredientType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class IngredientController extends Controller
{
    const PATH = 'pages/backend/ingredients/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return view(self::PATH.'index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredient = null;
        $ingredientTypes = IngredientType::all();
        return view(self::PATH.'create', compact('ingredient','ingredientTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = null;
        if($request->file('image')){
            $path = $request->file('image')->store('ingredients','public');
        }


        $placeholders = ['img/placeholders/placeholder-200-400.png','img/placeholders/placeholder-200-300.png','img/placeholders/placeholder-200-200.png'];

        $data=[
            'name'=>$request->name,
            'img'=>(($path)?'storage/'.$path: Arr::random($placeholders)),
            'ingredient_type_id'=>$request->ingredientType,
        ];

        $ingredient = Ingredient::create($data);

        return redirect()->route('backend.ingredients.index')->with('success','Your ingredient has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }
}
