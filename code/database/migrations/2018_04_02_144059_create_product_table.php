<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("slug");
            $table->string("code_product")->nullable();
            $table->string("image_url")->nullable();
            $table->integer("cate_id")->nullable();
            $table->string("cate_name")->nullable();
            $table->text("description")->nullable();
            $table->string("tag")->nullable();
            $table->string("price")->nullable();
            $table->string("made_in")->nullable();
            $table->string("trade")->nullable();
            $table->string("status")->comments("0: còn hàng, 1: hết hàng");
            $table->text("promotion");
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
        Schema::dropIfExists('products');
    }
}
