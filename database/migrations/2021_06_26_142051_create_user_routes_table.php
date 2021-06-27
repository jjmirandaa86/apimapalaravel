<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_routes', function (Blueprint $table) {
            $table->unsignedBigInteger('idUser')->nullable(false);
            $table->string('idRoute', 6)->nullable(false);
            $table->string('state', 1)->default('A');
            $table->timestamps();

            $table->primary(['idUser', 'idRoute']);

            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idRoute')->references('idRoute')->on('routes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_routes');
    }
}
