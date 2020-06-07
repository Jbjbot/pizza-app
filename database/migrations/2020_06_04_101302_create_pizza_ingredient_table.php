<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_pizza', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pizza_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
            $table->foreign('pizza_id')->references('id')->on('pizza');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
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
        Schema::table('pizza_ingredient', function(Blueprint $table) {
            $table->dropForeign('pizza_ingredient_pizza_id_foreign');
            $table->dropForeign('pizza_ingredient_ingredient_id_foreign');
        });

        Schema::dropIfExists('pizza_ingredient');
    }
}
