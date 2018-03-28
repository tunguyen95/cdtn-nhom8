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
            $table->string("title");
            $table->string("description")->nullable();
            $table->string("image_url");
            $table->longtext("content");
            $table->integer("author");
            $table->string("slug");
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
