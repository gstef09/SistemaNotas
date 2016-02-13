@extends('layouts.app')

@section('title', 'Lista de Profesores')

@section('content')
<div class="container no-padding">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Lista de Profesores</div>
                <div class="panel-body">
                    <a href="{{route('admin.profesores.create')}}" class="btn btn-success">Nuevo Profesor</a><br><br>
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
                                @foreach($profesores as $profesor)
                                    <tr>
                                        <td>{{$profesor->facultad->descripcion}}</td>
                                        <td>{{$profesor->cedula}}</td>
                                        <td>{{$profesor->nombres.' '.$profesor->apellidos}}</td>
                                        <td>{{$profesor->telefono}}</td>
                                        <td>{{$profesor->direccion}}</td>
                                        <td>{{$profesor->correo}}</td>
                                        <td>
                                            <a href="{{route('admin.profesores.edit', $profesor->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil fa-fw"></i> Editar</a>
                                            <a href="{{route('admin.profesores.destroy', $profesor->id)}}" onclick="return confirm('¿Seguro desea eliminar este profesor?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div align="center">{!! $profesores->render() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection