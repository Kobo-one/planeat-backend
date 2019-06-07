<?php

namespace App\Http\Controllers\Backend;

use App\Ingredient;
use App\IngredientType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Intervention\Image\Image;

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
        $image= $request->file('image');
        if($image){
            $path = $image->store('ingredients','public');
            $exif = exif_read_data($image);
            if(!empty($exif['Orientation'])) {
                $source = imagecreatefromjpeg( storage_path('app/public/'.$path));
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




        $placeholders = ['img/placeholders/placeholder-200-400.png','img/placeholders/placeholder-200-300.png','img/placeholders/placeholder-200-200.png'];
        $placeholder = Arr::random($placeholders);
        $img = ($path)?'storage/'.$path: $placeholder;

        $data=[
            'name'=>Str::lower($request->name),
            'ingredient_type_id'=>$request->ingredientType,
        ];



        $ingredient = Ingredient::create($data);
        $ingredient->img = $img;
        $ingredient->save();
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
