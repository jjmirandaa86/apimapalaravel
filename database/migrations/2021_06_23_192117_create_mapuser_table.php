<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapuser', function (Blueprint $table) {
            $table->id('idUser')->primary();
            $table->string('firtsName', 50);
            $table->string('lastName', 50);
            $table->string('position', 50);
            $table->string('email', 40)->unique();
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
        Schema::dropIfExists('mapuser');
    }
}
