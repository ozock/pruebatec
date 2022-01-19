<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTercero extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*tercero (id, tipoidentificacion, 
        numeroidentificacion, tipotercero, nombre1, nombre2, 
        apellido1, apellido2, iddepartamento, idmunicipio) */

        Schema::create('tercero', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';

            $table->id();
            $table->string('tipoidentificacion');
            $table->integer('numeroidentificacion');
            $table->unsignedBigInteger('tipotercero');
            $table->string('nombre1');
            $table->string('nombre2')->nullable(true);
            $table->string('apellido1');
            $table->string('apellido2')->nullable(true);
            $table->unsignedBigInteger('iddepartamento');
            $table->unsignedBigInteger('idmunicipio');

            $table->foreign('tipotercero')->references('id')->on('tipotercero');
            $table->foreign('iddepartamento')->references('id')->on('departamento');
            $table->foreign('idmunicipio')->references('id')->on('municipio');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tercero');
    }
}
