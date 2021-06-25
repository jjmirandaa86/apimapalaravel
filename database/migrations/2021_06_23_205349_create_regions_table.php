<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id('idRegion')->primary();
            $table->string('idCountry', 2)->nullable(false);
            $table->string('name', 30)->nullable(false);
            $table->string('state', 1)->default('A');
            $table->timestamps();

            $table->foreign('idCountry')->references('idCountry')->on('countries')
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
        Schema::dropIfExists('regions');
    }
}
