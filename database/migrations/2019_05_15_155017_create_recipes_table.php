<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('img')->nullable();
            $table->unsignedBigInteger('preparation_time')->nullable(); //minutes
            $table->unsignedBigInteger('cooking_time_min')->nullable(); //minutes
            $table->unsignedBigInteger('cooking_time_max'); //minutes
            $table->unsignedInteger('servings');
            $table->string('serving_size'); //(borden, stuks, potjes, …)
            $table->unsignedBigInteger('recipe_category_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
