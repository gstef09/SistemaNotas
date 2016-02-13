<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = "niveles";
    protected $fillable = ["descripcion","periodo_id"];

    public function materias()
    {
    	return $this->hasMany('App\Materia');
    }

    public function periodo()
    {
        return $this->belongsTo('App\Periodo');
    }

    public function scopeElegir($query, $descripcion)
    {
        return $query->where('descripcion', '=', $descripcion);
    }
}


