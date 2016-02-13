@extends('layouts.app')

@section('title', 'Lista de Materias')

@section('content')
<div class="container no-padding">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Lista de materia</div>
                <div class="panel-body">
                    <a href="{{route('admin.materias.create')}}" class="btn btn-success">Nuevo materia</a><br><br>
                    <div class="table-responsive ">
                        <table class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>Nivel</th>
                                <th>Materia</th>
                                <th>Credito</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach($materias as $materia)
                                    <tr>
                                        <td>{{$materia->nivel->descripcion}}</td>
                                        <td>{{$materia->descripcion}}</td>
                                        <td>{{$materia->credito}}</td>
                                        <td>
                                            <a href="{{route('admin.materias.edit', $materia->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil fa-fw"></i> Editar</a>
                                            <a href="{{route('admin.materias.destroy', $materia->id)}}" onclick="return confirm('¿Seguro desea eliminar esta materia?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                        <div align="center">{!! $materias->render() !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection