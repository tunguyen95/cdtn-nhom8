<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string("tag")->nullable();
            $table->string("title")->nullable();
            $table->string("description")->nullable();
            $table->string("image_url")->nullable();
            $table->longtext("content")->nullable();
            $table->integer("author")->nullable();
            $table->string("slug")->nullable();
            $table->integer("status")->default(0)->comment("0: pending, 1: avaiable");
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
        Schema::dropIfExists('articles');
    }
}
