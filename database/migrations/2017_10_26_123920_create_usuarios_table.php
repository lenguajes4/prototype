<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 20);
            $table->string('apellido', 20);
            $table->string('nickname', 15)->unique();
            $table->integer('dni')->unique();
            $table->string('matricula', 20)->nullable()->default(null);
            $table->string('telefono', 15)->nullable()->default(null);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->integer('registro_id')->unsigned();
            $table->string('image_path', 50)->nullable()->default(null);
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('usuarios', function($table) {
            $table->foreign('registro_id')->references('id')->on('registros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
