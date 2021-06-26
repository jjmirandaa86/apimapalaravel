<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('idUser')->primary();
            $table->string('firtsName', 50)->nullable(false);
            $table->string('lastName', 50)->nullable(false);
            $table->string('position', 50)->nullable(false);
            $table->string('email', 40)->nullable(false)->unique();
            $table->string('password')->nullable();
            $table->string('api_token')->nullable();
            $table->rememberToken();
            $table->string('state', 1)->default('A');
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
}
