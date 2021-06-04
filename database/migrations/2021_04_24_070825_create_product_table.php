<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('product_id');
            $table->string('product_name');
            $table->longText('product_description');
            $table->longText('product_content');
            $table->integer('product_price');
            $table->integer('product_rating')->default(0);
            $table->integer('product_quantity')->default(0);
            $table->string('product_image');
            $table->string('category_id');
            $table->integer('product_view');
            $table->integer('product_total_comment')->default(0)->comment('tổng số comment');
            $table->integer('product_total_review')->default(0)->comment('tổng số đánh giá');
            $table->integer('product_total_number')->default(0)->comment('Tổng số điểm đánh giá');
            $table->timestamps();
            $table->foreign('category_id')->references('category_id')->on('categories');
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
