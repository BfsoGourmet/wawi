<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_products', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('product_id');
            $table->integer('amount');
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('product_id')->references('id')->on('products')->default(NULL);
            $table->foreign('delivery_id')->references('id')->on('deliveries')->default(NULL);
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
        Schema::dropIfExists('delivery_products');
    }
}
