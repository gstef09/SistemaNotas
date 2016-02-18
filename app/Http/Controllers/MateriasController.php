<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Materia; 
use App\Nivel;   
use App\Periodo;  
use App\Alumno; 
use App\Http\Requests\AlumnoRequest; 
use DB;

class MateriasController extends Controller
{
    function __construct() 
    {
        //$this->middleware('auth', ['except' => 'elegir']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $materias = Materia::Buscador($request->descripcion)->orderBy('id', 'ASC')->paginate(10);
        $materias->each(function($materias){
            $materias->nivel;
        }); 

        return view('admin.materias.index')->with('materias', $materias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = Nivel::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
        return view('admin.materias.crear')->with('niveles', $niveles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materia = new Materia($request->all());
        $materia->save();
        return redirect()->route('admin.materias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::find($id);
        return view('admin.materias.editar')->with('materia', $materia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materia = Materia::find($id);
        $materia->descripcion = $request->descripcion;
        $materia->credito = $request->credito;

        $materia->save();
        return redirect()->route('admin.materias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $materia = Materia::find($id);
        $materia->delete();
        return redirect()->route('admin.materias.index');
    }

    public function cargarMaterias(Request $request, $id)
    {
        if($request->ajax())
        {
            $materias= Materia::cargarMaterias($id);

            return response()->json($materias);
        }
    }
    public function elegir()
    {
        // $nivel = Nivel::elegir($descripcion)->get();
        // dd($nivel);
        $alumnos = Alumno::selectRaw('CONCAT(nombres, "  ", apellidos) as TenantFullName, id')->orderBy('id')->lists('TenantFullName', 'id');  
        //$alumnos = Alumno::orderBy('id', 'ASC')->lists();
        $niveles = Nivel::orderBy('id', 'ASC')->lists('descripcion', 'id');
        $materias = Materia::orderBy('id', 'ASC')->lists('descripcion', 'id');
        $periodos = Periodo::orderBy('id', 'ASC')->lists('descripcion', 'id');
        return view('invitado.materias.elegir')->with('niveles', $niveles)->with('materias', $materias)->with('periodos', $periodos)->with('alumnos',$alumnos);
    }  

    public function guardarSeleccion(Request $request)
    {
        $alumno = new Alumno($request->all());
        $alumno = $request->alumno_id;
        
        
        $materias=$request->materia_id;
        foreach ($materias as $id) {
            DB::table('alumno_materia')->insert(['alumno_id' => $alumno, 'materia_id' => $id]);
        }
        return $this->elegir();
    } 
}
