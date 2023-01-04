<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices_pizzas', function (Blueprint $table) {
            $table->id();
            $table->double('12_size');
            $table->double('18_size');
            $table->unsignedBigInteger('pizza_id')->unique();
            $table->timestamps();

            $table->foreign('pizza_id')->references('id')->on('pizzas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices_pizzas');
    }
};
