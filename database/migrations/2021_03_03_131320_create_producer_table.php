<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producers', function (Blueprint $table) {
            $table->id('id');
            $table->text('company');
            $table->text('contact_firstname');
            $table->text('contact_lastname');
            $table->text('contact_phone');
            $table->boolean('is_deleted');
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
        Schema::dropIfExists('producers');
    }
}
