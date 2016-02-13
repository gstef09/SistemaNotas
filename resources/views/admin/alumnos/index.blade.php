@extends('layouts.app')

@section('title', 'Lista de Alumno')

@section('content')
<div class="container no-padding">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Lista de Alumno</div>
                <div class="panel-body">
                    <a href="{{route('admin.alumnos.create')}}" class="btn btn-success">Nuevo Alumno</a><br><br>
                    <div class="table-responsive ">
                        <table class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>Facultad</th>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Telefono</th>
                                <th>Dirección</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach($alumnos as $alumno)
                                    <tr>
                                        <td>{{$alumno->facultad->descripcion}}</td>
                                        <td>{{$alumno->cedula}}</td>
                                        <td>{{$alumno->nombres.' '.$alumno->apellidos}}</td>
                                        <td>{{$alumno->telefono}}</td>
                                        <td>{{$alumno->direccion}}</td>
                                        <td>{{$alumno->correo}}</td>
                                        <td>
                                            <a href="{{route('admin.alumnos.edit', $alumno->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil fa-fw"></i> Editar</a>
                                            <a href="{{route('admin.alumnos.destroy', $alumno->id)}}" onclick="return confirm('¿Seguro desea eliminar este alumno?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div align="center">{!! $alumnos->render() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection