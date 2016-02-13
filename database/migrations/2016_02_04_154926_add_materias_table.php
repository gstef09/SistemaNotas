<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 50);
            $table->integer('credito');
            $table->string('estado', 20);
            $table->integer('nivel_id')->unsigned();

            $table->foreign('nivel_id')->references('id')->on('niveles')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('alumno_materia', function(Blueprint $table)
            {
                $table->increments('id');
                $table->integer('alumno_id')->unsigned();
                $table->integer('materia_id')->unsigned();

                $table->foreign('alumno_id')->references('id')->on('alumnos');
                $table->foreign('materia_id')->references('id')->on('materias');

                $table->timestamps();
            });

        Schema::create('profesor_materia', function(Blueprint $table)
            {
                $table->increments('id');
                $table->integer('profesor_id')->unsigned();
                $table->integer('materia_id')->unsigned();

                $table->foreign('profesor_id')->references('id')->on('profesores');
                $table->foreign('materia_id')->references('id')->on('materias');

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
        Schema::drop('materias');
    }
}
