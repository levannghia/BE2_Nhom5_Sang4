<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('customer_id');
            $table->string('shipping_id');
            $table->string('payment_id');
            $table->float('order_total');
            $table->float('order_status');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('shipping_id')->references('shipping_id')->on('shipping');
            $table->foreign('payment_id')->references('payment_id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
