<?php

namespace App\Http\Controllers\Adult;

use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipesController extends Controller
{
    const PATH = 'pages/adult/';

    public function index(){
        $recipes = Recipe::all();
        return view(self::PATH.'recipes', compact('recipes'));
    }
}
