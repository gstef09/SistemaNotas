<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aniolectivo extends Model
{
    protected $table = "aniolectivos";
    protected $fillable = ["descripcion"];

    public function periodos()
    {
    	return $this->hasMany('App\Periodo');
    }
}
