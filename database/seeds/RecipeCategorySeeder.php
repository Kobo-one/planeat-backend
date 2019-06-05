<?php

use App\RecipeCategory;
use Illuminate\Database\Seeder;

class RecipeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data=[
            ['name'=>"Breakfast"],
            ['name'=>"Dinner"],
            ['name'=>"Lunch"],
            ['name'=>"Snack"],

        ];
        $recipeCategory = RecipeCategory::insert($data);

    }
}
