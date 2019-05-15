<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'tag_translations',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedBigInteger('tag_id')->nullable();
                $table->string('title');
                $table->string('locale')->index();

                $table->unique(['tag_id', 'locale']);
                $table->foreign('tag_id')->references('id')->on('tags');
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
