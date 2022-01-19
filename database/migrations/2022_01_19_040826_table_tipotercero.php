<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTipotercero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipotercero', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';

            $table->id();
            $table->string('nombtipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipotercero');
    }
}
