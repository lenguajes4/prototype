<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_tramite_id')->unsigned();
            $table->integer('tipo_tramite_id')->unsigned();
            $table->integer('vehiculo_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('numero_tramite')->unique()->unsigned();
            $table->text('observaciones')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::table('informes', function($table) {
            $table->foreign('estado_tramite_id')->references('id')->on('estados_tramite');
            $table->foreign('tipo_tramite_id')->references('id')->on('tipos_tramite');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informes');
    }
}
