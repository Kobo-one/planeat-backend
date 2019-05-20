<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('families', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->foreign('recipe_category_id')->references('id')->on('recipe_categories')->onDelete('set null');
        });

        Schema::table('family_members', function (Blueprint $table) {
            $table->foreign('family_id')->references('id')->on('families')->onDelete('set null');
        });

        Schema::table('ingredients', function (Blueprint $table) {
            $table->foreign('ingredient_type_id')->references('id')->on('ingredient_types')->onDelete('set null');
        });

        Schema::table('allergy_ingredients', function (Blueprint $table) {
            $table->foreign('allergy_id')->references('id')->on('allergies')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });

        Schema::table('recipe_steps', function (Blueprint $table) {
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
        });

        Schema::table('member_allergies', function (Blueprint $table) {
            $table->foreign('family_member_id')->references('id')->on('family_members')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });

        Schema::table('recipe_ingredients', function (Blueprint $table) {
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
        });

        Schema::table('family_quests', function (Blueprint $table) {
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });

        Schema::table('quest_recipes', function (Blueprint $table) {
            $table->foreign('family_quest_id')->references('id')->on('family_quests')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
        });

        Schema::table('family_member_difficult_ingredients', function (Blueprint $table) {
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
            $table->foreign('family_member_id')->references('id')->on('family_members')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
