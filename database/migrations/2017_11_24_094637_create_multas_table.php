<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehiculo_id')->unsigned();
            $table->integer('jurisdiccion_id')->unsigned();
            $table->integer('acta')->unsigned();
            $table->integer('monto')->unsigned();
            $table->timestamps();
        });

        Schema::table('multas', function($table) {
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->foreign('jurisdiccion_id')->references('id')->on('jurisdicciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multas');
    }
}
