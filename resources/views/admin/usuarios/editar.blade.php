@extends('layouts.app')
@section('title', 'Registrar Usuario')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar Usuario</div>
                <div class="panel-body">
					{!! Form::open(['route'=>['admin.usuarios.update', $usuario], 'method'=>'PUT']) !!}
							<div class="form-group">
								{!! Form::label('name', 'Nombre') !!}
								{!! Form::text('name', $usuario->name, ['class'=>'form-control','placeholder'=>'Nombre Completo', 'required']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('email', 'Correo Electrónico') !!}
								{!! Form::email('email', $usuario->email, ['class'=>'form-control','placeholder'=>'example@gmail.com', 'required']) !!}
							</div>

							<div class="form-group">
								{!! Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
							</div>

					{!! Form::close() !!}
				</div>
            </div>
        </div>
    </div>
</div>
@endsection