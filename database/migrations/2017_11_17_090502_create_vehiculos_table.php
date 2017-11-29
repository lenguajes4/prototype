<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dominio', 50)->unique();
            $table->integer('tipo_vehiculo_id')->unsigned();
            $table->integer('provincia_baja_id')->nullable();
            $table->string('municipio_baja', 256)->nullable();
            $table->dateTime('fecha_baja')->nullable();
            $table->boolean('baja_requerida')->nullable();
            $table->timestamps();
        });

        Schema::table('vehiculos', function($table) {
            $table->foreign('tipo_vehiculo_id')->references('id')->on('tipos_vehiculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
