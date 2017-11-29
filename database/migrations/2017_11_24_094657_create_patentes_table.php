<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehiculo_id')->unsigned();
            $table->integer('jurisdiccion_id')->unsigned();
            $table->integer('year')->unsigned();
            $table->text('periodos');
            $table->integer('monto_unitario')->unsigned();
            $table->timestamps();
        });

        Schema::table('patentes', function($table) {
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
        Schema::dropIfExists('patentes');
    }
}
