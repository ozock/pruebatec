<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMunicipio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipio', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';

            $table->id();
            $table->string('nombmuni');
            $table->unsignedBigInteger('iddepa');

            $table->foreign('iddepa')->references('id')->on('departamento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipio');
    }
}
