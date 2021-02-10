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
        Schema::create('users', function ($table) {
            $table->id('user_id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
           // $table->remeberToken();
            $table->timestamps();
        });

        Schema::create('products', function ($table) {
            $table->id('id');
            $table->string('sku');
//            $table->integer('is_live');
            $table->string('title');
            //$table->text('short_desc');
            //$table->text('long_desc');
            //$table->integer('courir_id');
            //$table->integer('stock_count');
            $table->float('price');
            $table->timestamps();
            //$table->string('calories');
            //$table->string('sugar');
            //$table->string('declaration');
            //$table->integer('producer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
