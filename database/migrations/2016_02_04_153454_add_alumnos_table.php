<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula', 11);
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('telefono', 50);
            $table->string('direccion', 50);
            $table->string('correo')->unique();
            $table->integer('facultad_id')->unsigned();

            $table->foreign('facultad_id')->references('id')->on('facultades')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alumnos');
    }
}
