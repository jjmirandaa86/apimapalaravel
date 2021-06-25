<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapusercredentialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapusercredential', function (Blueprint $table) {
            $table->id('idUserCredential')->primary();
            $table->unsignedBigInteger('idUser')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('token')->nullable(false);
            $table->timestamps();

            $table->foreign('idUser')->references('idUser')->on('mapuser')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapusercredential');
    }
}
