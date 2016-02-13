@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Lista de Usuarios</div>
                <div class="panel-body">
                    <a href="{{route('admin.usuarios.create')}}" class="btn btn-success">Nuevo Usuario</a><br><br>
                    <div class="table-responsive ">
                        <table class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->id}}</td>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>
                                            <a href="{{route('admin.usuarios.edit', $usuario->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil fa-fw"></i> Editar</a>
                                            <a href="{{route('admin.usuarios.destroy', $usuario->id)}}" onclick="return confirm('¿Seguro desea eliminar este usuario?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div align="center">{!! $usuarios->render() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection