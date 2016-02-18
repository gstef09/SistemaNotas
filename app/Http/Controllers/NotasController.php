<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Alumno;
use App\Materia;
use App\Aniolectivo;
use App\Periodo;
use App\Nota;
use DB;

class NotasController extends Controller
{
    function __construct() 
    {
        $this->middleware('auth', ['except' => 'consultar']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::selectRaw('CONCAT(nombres, "  ", apellidos) as NombreCompleto, id')->orderBy('id')->lists('NombreCompleto', 'id');
        //$materias = Materia::orderBy('id', 'ASC')->lists('descripcion', 'id');
        $materias= (array) DB::select('select alumno_materia.id,materias.descripcion from alumno_materia  inner join materias on alumno_materia.materia_id =
         materias.id inner join alumnos on alumnos.id = alumno_materia.alumno_id WHERE alumnos.id=1');
      
        return view('admin.notas.ingresar')->with('alumnos', $alumnos)->with('materias',$materias);//->with('materias', $materias);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumnos = Alumno::selectRaw('CONCAT(nombres, "  ", apellidos) as NombreCompleto, id')->orderBy('id')->lists('NombreCompleto', 'id');
        $materias = Materia::orderBy('id', 'ASC')->lists('descripcion', 'id');
        $nota = new Nota($request->all());
        //dd($nota);
        $nota->save();

        return view('admin.notas.ingresar')->with('alumnos', $alumnos)->with('notas',$notas)->with('materias',$materias);
    }

    public function consultar()
    {
        $lectivos = Aniolectivo::orderBy('id', 'ASC')->lists('descripcion', 'id');
        $periodos = Periodo::orderBy('id', 'ASC')->lists('descripcion', 'id');
        return view('invitado.notas.consultar')->with('lectivos', $lectivos)->with('periodos', $periodos);
    }

    public function consultar_notas()
    {
        $cedula=$_POST['cedula'];
        
        $notas=DB::select("SELECT materias.descripcion, notas.nota1, notas.nota2 , notas.recuperacion, (notas.nota1+notas.nota2) as suma,materias.credito, materias.estado  FROM `notas` inner join materias on notas.materia_id = materias.id inner join alumno_materia on alumno_materia.materia_id = materias.id 
            inner join alumnos on alumnos.id= alumno_materia.alumno_id WHERE alumnos.cedula='$cedula'");
    
        json_encode($notas);
    }
}
