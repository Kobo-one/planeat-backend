<?php

namespace App\Http\Controllers\Adult;

use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipesController extends Controller
{
    const PATH = 'pages/adult/recipes/';

    public function index(){
        $recipes = Recipe::all()->shuffle();
        return view(self::PATH.'index', compact('recipes'));
    }

    public function show(Recipe $recipe){
        return view(self::PATH.'detail', compact('recipe'));
    }
}
