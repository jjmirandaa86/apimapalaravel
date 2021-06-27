<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id()->primary();
            $table->date('visitDate')->nullable(false);
            $table->string('idRoute', 6)->nullable(false);
            $table->integer('correlativePlan');
            $table->integer('correlativeVisit');
            $table->bigInteger('idCliente')->nullable(false);
            $table->time('visitHour', $precision = 0)->nullable(false);
            $table->float('latVisit', 8, 6);
            $table->float('longVisit', 8, 6);
            $table->string('typeVisit', 3)->default('ND');
            $table->string('state', 1)->default('A');

            /*  TypeVisit
                ND - No definida
                VC - Visita Compra
                VSC - Visita sin Compra
                NV - No visitado
                UNR - Ubicacion No recuperada
                FA - Fuera Alcance
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
