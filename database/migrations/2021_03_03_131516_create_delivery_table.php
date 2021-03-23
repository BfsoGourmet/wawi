<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id('id');
            $table->text('customer_firstname');
            $table->text('customer_lastname');
            $table->text('delivery_address');
            $table->text('delivery_zip');
            $table->text('delivery_place');
            $table->text('delivery_country');
            $table->unsignedBigInteger('courier_id')->default('null');
            $table->foreign('courier_id')->references('id')->on('couriers');
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
        Schema::dropIfExists('deliveries');
    }
}
