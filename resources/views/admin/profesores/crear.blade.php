@extends('layouts.app')
@section('title', 'Registrar Usuario')
@section('content')
<div class="container no-padding">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Registrar Usuario</div>
                <div class="panel-body">
					{!! Form::open(['route'=>'admin.profesores.store', 'method'=>'POST']) !!}
						<div class="form-group">
							{!! Form::label('facultad_id', 'Facultad') !!}
							{!! Form::select('facultad_id', $facultades, null, ['class'=>'form-control select-category', 'required']) !!}
						</div>

						<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
							{!! Form::label('cedula', 'Cedula') !!}
							{!! Form::text('cedula', null, ['class'=>'form-control','placeholder'=>'Número de Cedula', 'value'=> 'old(cedula)']) !!}
							@if ($errors->has('cedula'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
							{!! Form::label('nombres', 'Nombres') !!}
							{!! Form::text('nombres', null, ['class'=>'form-control','placeholder'=>'Nombres', 'value'=> 'old(nombres)']) !!}
							@if ($errors->has('nombres'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombres') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
							{!! Form::label('apellidos', 'Apellidos') !!}
							{!! Form::text('apellidos', null, ['class'=>'form-control','placeholder'=>'Apellido', 'value'=> 'old(apellidos)']) !!}
							@if ($errors->has('apellidos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('apellidos') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
							{!! Form::label('telefono', 'Telefono') !!}
							{!! Form::number('telefono', null, ['class'=>'form-control','placeholder'=>'Telefono', 'value'=> 'old(telefono)']) !!}
							@if ($errors->has('telefono'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
							{!! Form::label('direccion', 'Dirección') !!}
							{!! Form::text('direccion', null, ['class'=>'form-control','placeholder'=>'Dirección', 'value'=> 'old(direccion)']) !!}
							@if ($errors->has('direccion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
							{!! Form::label('correo', 'Correo Electrónico') !!}
							{!! Form::email('correo', null, ['class'=>'form-control','placeholder'=>'example@gmail.com', 'value'=> 'old(correo)']) !!}
							@if ($errors->has('correo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('correo') }}</strong>
                                </span>
                            @endif
						</div>

							<div class="form-group">
								{!! Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
							</div>

					{!! Form::close() !!}
				</div>
            </div>
        </div>
    </div>
</div>
@endsection