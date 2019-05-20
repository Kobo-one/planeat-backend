<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMemberTableAddAvatarEtc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('family_members', function (Blueprint $table) {
            $table->unsignedBigInteger('avatar_id')->nullable();
            $table->unsignedBigInteger('weapon_id')->nullable();
            $table->unsignedBigInteger('shield_id')->nullable();
            $table->foreign('avatar_id')->references('id')->on('equipment')->onDelete('set null');
            $table->foreign('weapon_id')->references('id')->on('equipment')->onDelete('set null');
            $table->foreign('shield_id')->references('id')->on('equipment')->onDelete('set null');


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
