<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRecipe extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->can('create recipes')){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description'=>'required|string',
            'image'=>'required|image',
            'recipeType'=>'required|integer',
            'prepTime'=>'nullable|integer',
            'cookTimeMin'=>'nullable|integer',
            'cookTimeMax'=>'required|integer',
            'servings'=>'required|integer',
            'servingType'=>'string',
            'steps'=>'required',
            'steps[*]'=>'string',
            'ingredients'=>'required',
            'ingredientSizes'=>'required',
            'ingredients[*]'=>'integer',
            'ingredientSizes[*]'=>'integer',
            'ingredientServingTypes[*]'=>'nullable|string',
        ];
    }
}
