<?php

use App\IngredientType;
use App\RecipeCategory;
use Illuminate\Database\Seeder;

class IngredientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data=[
            ['name'=>"Fish"],
            ['name'=>"Vegetable"],
            ['name'=>"Fruit"],
            ['name'=>"Grain"],
            ['name'=>"Bean"],
            ['name'=>"Nut"],
            ['name'=>"Shellfish"],
            ['name'=>"Dairy"],
            ['name'=>"Meat"],
            ['name'=>"Poultry"],
            ['name'=>"Insect"],
            ['name'=>"Root"],
        ];
        $ingredientType = IngredientType::insert($data);

    }
}
