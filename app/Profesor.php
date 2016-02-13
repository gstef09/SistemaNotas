<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = "profesores";
    protected $fillable = ["cedula","nombres", "apellidos", "telefono", "direccion", "correo", "facultad_id"];

    public function facultad()
    {
    	return $this->belongsTo('App\Facultad');
    }

    public function materias()
    {
    	return $this->belongsToMany('App\Materias')->withTimestamps();
    }
}
