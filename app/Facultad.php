<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = "facultades";
    protected $fillable = ["descripcion"];

    public function alumnos()
    {
    	return $this->hasMany('App\Alumno');
    }

    public function profesores()
    {
    	return $this->hasMany('App\Profesor');
    }
}
