<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategroryTagIngredientTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_translation', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();

            $table->unique(['tag_id','locale']);
            $table->foreign('tag_id')->references('id')->on('meals')->onDelete('cascade');
        });
        Schema::create('categories_translation', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();

            $table->unique(['category_id','locale']);
            $table->foreign('category_id')->references('id')->on('meals')->onDelete('cascade');
        });
        Schema::create('ingredients_translation', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('ingredient_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();

            $table->unique(['ingredient_id','locale']);
            $table->foreign('ingredient_id')->references('id')->on('meals')->onDelete('cascade');
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
