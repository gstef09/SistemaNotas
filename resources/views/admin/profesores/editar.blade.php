@extends('layouts.app')
@section('title', 'Actualizar Usuario')
@section('content')
<div class="container no-padding">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Actualizar Usuario</div>
                <div class="panel-body">
					{!! Form::open(['route'=>['admin.profesores.update', $profesor], 'method'=>'PUT']) !!}
							<div class="form-group">
								{!! Form::label('nombres', 'Nombres') !!}
								{!! Form::text('nombres', $profesor->nombres, ['class'=>'form-control','placeholder'=>'Nombres', 'required']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('apellidos', 'Apellidos') !!}
								{!! Form::text('apellidos', $profesor->apellidos, ['class'=>'form-control','placeholder'=>'Apellido', 'required']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('telefono', 'Telefono') !!}
								{!! Form::text('telefono', $profesor->telefono, ['class'=>'form-control','placeholder'=>'Telefono', 'required']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('direccion', 'Dirección') !!}
								{!! Form::text('direccion', $profesor->direccion, ['class'=>'form-control','placeholder'=>'Dirección', 'required']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('correo', 'Correo Electrónico') !!}
								{!! Form::email('correo', $profesor->correo, ['class'=>'form-control','placeholder'=>'example@gmail.com', 'required']) !!}
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