<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWawiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('producer', function (Blueprint $table) {
            $table->id('id');
            $table->text('company');
            $table->text('contact_firstname');
            $table->text('contact_lastname');
            $table->text('contact_phone');
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id('id');
            $table->string('sku');
            $table->boolean('is_live');
            $table->string('title');
            $table->text('short_desc');
            $table->text('long_desc');
            $table->integer('courir_id');
            $table->integer('stock_count');
            $table->float('price');
            $table->timestamps();
            $table->string('calories');
            $table->string('sugar');
            $table->string('declaration');
            $table->unsignedBigInteger('producer_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('producer_id')->references('id')->on('producer');
        });

        Schema::create('season', function (Blueprint $table) {
            $table->id('id');
            $table->text('season');
            $table->date('date_from');
            $table->date('date_to');
        });

        Schema::create('seasional_price', function (Blueprint $table) {
            $table->id('id');
            $table->float('season_price');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('season_id');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('season_id')->references('id')->on('season');
        });

        Schema::create('courier', function (Blueprint $table) {
            $table->id('id');
            $table->text('firstname');
            $table->text('lastname');
            $table->text('phone');
        });

        Schema::create('delivery', function (Blueprint $table) {
            $table->id('id');
            $table->text('customer_firstname');
            $table->text('customer_lastname');
            $table->text('delivery_address');
            $table->text('delivery_zip');
            $table->text('delivery_place');
            $table->text('delivery_country');
            $table->unsignedBigInteger('courier_id');
            $table->foreign('courier_id')->references('id')->on('courier');
        });

        Schema::create('delivery_product', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('delivery_id')->references('id')->on('delivery');
        });

        Schema::create('category', function (Blueprint $table) {
            $table->id('id');
            $table->text('category');
        });

        Schema::create('special_price', function (Blueprint $table) {
            $table->id('id');
            $table->float('price');
            $table->date('date_from');
            $table->date('date_to');
            $table->text('name');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product');
        });

        Schema::create('image', function (Blueprint $table) {
            $table->id('id');
            $table->integer('sort');
            $table->text('path');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
        Schema::dropIfExists('producter');
        Schema::dropIfExists('category');
        Schema::dropIfExists('seasional_price');
        Schema::dropIfExists('season');
        Schema::dropIfExists('special_price');
        Schema::dropIfExists('delivery_product');
        Schema::dropIfExists('delivery');
        Schema::dropIfExists('courier');
    }
}
