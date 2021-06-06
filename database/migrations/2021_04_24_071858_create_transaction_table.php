<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->string('customer_name');
            $table->integer('total');
            $table->integer('quantity');
            $table->string('address');
            $table->string('telephone');
            $table->string('product_id');
            $table->string('cart_id');
            $table->timestamps();
            $table->foreign('cart_id')->references('cart_id')->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
