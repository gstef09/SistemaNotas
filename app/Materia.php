<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = "materias";
    protected $fillable = ["descripcion","credito", "estado", "nivel_id"];

    public function nivel()
    {
    	return $this->belongsTo('App\Nivel');
    }

    public function nota()
    {
        return $this->belongsTo('App\Nota');
    }

    public function alumnos()
    {
        return $this->belongsToMany('App\Alumno')->withTimestamps();
    }

    public function profesores()
    {
        return $this->belongsToMany('App\Profesor')->withTimestamps();
    }

    public function scopeBuscador($query, $descripcion)
    {
        return $query->where('descripcion', 'LIKE', "%$descripcion%");
    }

    public static function cargarMaterias($id){
        return Materia::where('nivel_id','=',$id)->get();
    }
}
