<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Scritto da: Antonio Gravina, Marco Pernisco, Mattia Siragusa
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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('bio')->nullable();
            $table->string('role')->default('base');
            $table->string('password');
            $table->string('reset_password_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
