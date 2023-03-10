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
        Schema::create('association_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('association_id')->unsigned();
            $table->foreign('association_id')->references('id')->on('associations');
            $table->primary(['user_id', 'association_id']);
            $table->string('token')->unique();
            $table->boolean('verified')->default(false);
            $table->boolean('moderator')->default(false);
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
        Schema::dropIfExists('association_user');
    }
};
