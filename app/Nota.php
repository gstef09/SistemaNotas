<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = "notas";
    protected $fillable = ["nota1","nota2", "recuperacion", "materia_id"];

    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }
}
