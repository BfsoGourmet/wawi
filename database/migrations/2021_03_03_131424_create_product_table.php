<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('products', function (Blueprint $table) {
      $table->id('id');
      $table->string('sku');
      $table->boolean('is_live')->default(0);
      $table->string('name');
      $table->text('short_desc');
      $table->text('long_desc');
      $table->integer('courir_id');
      $table->integer('stock_count');
      $table->float('price');
      $table->float('special_price')->nullable();
      $table->boolean('special_price_active')->default(0);
      $table->float('season_price')->nullable();
      $table->integer('season_id')->nullable();
      $table->string('calories');
      $table->string('sugar');
      $table->string('declaration');
      $table->unsignedBigInteger('producer_id');
      $table->unsignedBigInteger('category_id');
      $table->foreign('producer_id')->references('id')->on('producers');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('products');
  }
}
