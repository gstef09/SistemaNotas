<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = "periodos";
    protected $fillable = ["decripcion","inicio", "fin", "aniolectivo_id"];

    public function aniolectivo()
    {
    	return $this->belongsTo('App\Aniolectivo');
    }

    public function nivel()
    {
        return $this->hasOne('App\Nivel');
    }
}
