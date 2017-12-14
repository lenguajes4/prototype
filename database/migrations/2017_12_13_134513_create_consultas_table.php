<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('informe_id')->unsigned();
            $table->text('consulta');
            $table->text('respuesta')->nullable();
            $table->boolean('visto')->default(false);
            $table->string('path')->nullable();
            $table->timestamps();
        });

        Schema::table('consultas', function($table) {
            $table->foreign('informe_id')->references('id')->on('informes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
