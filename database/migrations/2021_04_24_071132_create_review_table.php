<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('order_detail_id');
            $table->string('user_id')->index()->default(0);
            $table->integer('rating')->default(0);
            $table->longText('comment');
            $table->timestamps();
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('order_detail_id')->references('order_detail_id')->on('order_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
