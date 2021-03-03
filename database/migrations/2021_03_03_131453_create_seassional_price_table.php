<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeassionalPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seassional_prices', function (Blueprint $table) {
            $table->id('id');
            $table->float('season_price');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('season_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('season_id')->references('id')->on('seasons');
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
        Schema::dropIfExists('seassional_prices');
    }
}
