<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGroceryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grocery_items', function (Blueprint $table) {
            $table->dropForeign('grocery_items_ingredient_id_foreign');
            $table->dropColumn('ingredient_id');
            $table->dropColumn('serving_size');
            $table->string('name');
            $table->string('size')->nullable()->change(); // 1
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
