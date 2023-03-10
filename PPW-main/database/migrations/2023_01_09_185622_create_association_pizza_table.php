<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Scritto da: Antonio Gravina
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('association_pizza', function (Blueprint $table) {
            $table->bigInteger('association_id')->unsigned();
            $table->foreign('association_id')->references('id')->on('associations');
            $table->bigInteger('pizza_id')->unsigned();
            $table->foreign('pizza_id')->references('id')->on('pizzas');
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
        Schema::dropIfExists('association_pizza');
    }
};
