<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IngredientTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'ingredient_translations',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedBigInteger('ingredient_id')->nullable();
                $table->string('title');
                $table->string('locale')->index();

                $table->unique(['ingredient_id', 'locale']);
                $table->foreign('ingredient_id')->references('id')->on('ingredients');
            }
        );
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
