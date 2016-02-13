<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profesor;
use App\Facultad;
use App\Http\Requests\ProfesorRequest;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::orderBy('id', 'ASC')->paginate(5);
        $profesores->each(function($profesores)
            {
                $profesores->facultad;
            });
        return view('admin.profesores.index')->with('profesores', $profesores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultades = Facultad::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
        return view('admin.profesores.crear')->with('facultades', $facultades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfesorRequest $request)
    {
        $profesor = new Profesor($request->all());
        $profesor->save();
        return redirect()->route('admin.profesores.index');
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
        $profesor = Profesor::find($id);
        return view('admin.profesores.editar')->with('profesor', $profesor);
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
        $profesor = Profesor::find($id);
        $profesor->nombres = $request->nombres;
        $profesor->apellidos = $request->apellidos;
        $profesor->telefono = $request->telefono;
        $profesor->direccion = $request->direccion;
        $profesor->correo = $request->correo;

        $profesor->save();
        return redirect()->route('admin.profesores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = Profesor::find($id);
        $profesor->delete();
        return redirect()->route('admin.profesores.index');
    }
}
