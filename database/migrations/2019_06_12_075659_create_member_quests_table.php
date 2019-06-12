<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_quests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('family_member_id')->nullable();
            $table->foreign('family_member_id')->references('id')->on('family_members')->onDelete('cascade');
            $table->unsignedBigInteger('family_quest_id')->nullable();
            $table->foreign('family_quest_id')->references('id')->on('family_quests')->onDelete('cascade');
            $table->unsignedBigInteger('quest_recipe_id')->nullable();
            $table->foreign('quest_recipe_id')->references('id')->on('quest_recipes')->onDelete('set null');
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
        Schema::dropIfExists('member_quest');
    }
}
