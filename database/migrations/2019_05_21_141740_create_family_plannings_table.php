<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyPlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_plannings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
            $table->unsignedBigInteger('recipe_id')->nullable();
            $table->foreign('recipe_id')->references('id')->on('families')->onDelete('cascade');
            $table->date('date');
            $table->time('hour');
            $table->unsignedBigInteger('family_quest_id')->nullable();
            $table->foreign('family_quest_id')->references('id')->on('family_quests')->onDelete('set null');

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
        Schema::dropIfExists('family_plannings');
    }
}
