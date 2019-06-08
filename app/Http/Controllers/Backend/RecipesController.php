<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreRecipe;
use App\Ingredient;
use App\Recipe;
use App\RecipeCategory;
use App\RecipeIngredient;
use App\RecipeStep;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipesController extends Controller
{
    const PATH = 'pages/backend/recipes/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view(self::PATH.'index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipe = null;
        $recipeCategories = RecipeCategory::all();
        $ingriedients = Ingredient::all();
        return view(self::PATH.'create', compact('recipe','recipeCategories','ingriedients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipe $request)
    {
        $image= $request->file('image');
        if($image){
            $path = $image->store('recipes','public');
            $exif = exif_read_data($image);
            if(!empty($exif['Orientation'] && $exif['Orientation'] != 1)) {
                $source = imagecreatefromstring(file_get_contents(storage_path('app/public/'.$path)));
                $path = 'recipes/'.pathinfo($path, PATHINFO_FILENAME).'.jpeg';

                dd($exif['Orientation']);
                switch($exif['Orientation']) {
                    case 8:
                        $image = imagerotate($source,90,0);
                        break;
                    case 3:
                        $image = imagerotate($source,180,0);
                        break;
                    case 6:
                        $image = imagerotate($source,-90,0);
                        break;
                }
                imagejpeg($image,storage_path('app/public/'.$path));
                imagedestroy($image);
            }

        }

        $data=[
            'title'=>$request->title,
            'description'=>$request->description,
            'img'=>'storage/'.$path,
            'preparation_time'=>$request->prepTime,
            'cooking_time_min'=>$request->cookTimeMin,
            'cooking_time_max'=>$request->cookTimeMax,
            'servings'=>$request->servings,
            'serving_size'=>$request->servingType,
            'recipe_category_id'=>$request->recipeType,
            ];

        $recipe = Recipe::create($data);

        foreach ($request->steps as $key => $step){
            RecipeStep::create([
                'title' => $step,
                'recipe_id' => $recipe->id,
                'order' => $key,
            ]);
        }

        foreach ($request->ingredients as $key => $ingredient){

            RecipeIngredient::create([
                'ingredient_id' => $ingredient,
                'recipe_id' => $recipe->id,
                'size' => $request->ingredientSizes[$key],
                'serving_size' => $request->ingredientServingTypes[$key],
            ]);
        }

       return redirect()->route('backend.recipes.index')->with('success','Your recipe has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
