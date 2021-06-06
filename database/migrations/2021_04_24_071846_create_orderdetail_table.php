<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('order_detail_id');
            $table->string('order_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->string('sale_quantity');
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('order_detail_id')->references('order_detail_id')->on('reviews');
            $table->foreign('product_id')->references('product_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
