<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsForCookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_for_cookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id')->unsigned()->index();
            $table->integer('ingredient_id')->unsigned()->index();
            $table->integer('required_amount')->unsigned()->index();
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
        Schema::dropIfExists('ingredients_for_cookings');
    }
}
