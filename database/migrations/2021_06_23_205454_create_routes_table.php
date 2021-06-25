<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->string('idRoute', 6)->primary();
            $table->string('idOffice', 4)->nullable(false);
            $table->string('name', 30)->nullable(false);
            $table->string('state', 1)->default('A');
            $table->timestamps();

            $table->foreign('idOffice')->references('idOffice')->on('mapoffice')
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
        Schema::dropIfExists('routes');
    }
}
