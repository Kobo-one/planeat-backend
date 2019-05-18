<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_allergies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('family_member_id')->nullable();
            $table->unsignedBigInteger('ingredient_id')->nullable(); //Kunnen ingegeven worden via ingredient rechtstreeks of via allergie (leest vervolgens alle ingredienten die hierbij horen uit)
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
        Schema::dropIfExists('member_allergies');
    }
}
