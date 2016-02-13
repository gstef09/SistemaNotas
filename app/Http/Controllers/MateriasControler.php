<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Materia;
use App\Nivel;
use App\Periodo;
use App\Alumno;
use App\Http\Requests\MateriaRequest;
// use App\Http\Requests\AlumnoRequest;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::orderBy('id', 'ASC')->paginate(10);
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
    public function store(MateriaRequest $request)
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
        //
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
        return view('admin.materias.editar')->with('materias', $materias);
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

    public function elegir()
    {
        $niveles = Nivel::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
        $materias = Materia::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
        $periodos = Periodo::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
        return view('invitado.materias.elegir')->with('niveles', $niveles)->with('materias', $materias)->with('periodos', $periodos);
    }  

    public function guardarSelccion(AlumnoRequest $request)
    {
        // $alumno = new Alumno($request->all());
        // $alumno->materias()->sync($request->materias);
        // $alumno->save();
        dd('guardado');
    }  
}
