@extends('layouts.app')
@section('title', 'Registrar Usuario')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Registrar Usuario</div>
                <div class="panel-body">
                	{!! Form::open(['route'=>'admin.usuarios.store', 'method'=>'POST']) !!}
						{!! csrf_field() !!}
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							{!! Form::label('name', 'Nombre') !!}
							{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombre Completo','value'=> 'old(name)']) !!}
							@if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							{!! Form::label('email', 'Correo Electrónico') !!}
							{!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'example@gmail.com','value'=> 'old(email)']) !!}
							@if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							{!! Form::label('password', 'Contraseña') !!}
							{!! Form::password('password', ['class'=>'form-control','placeholder'=>'*************','value'=> 'old(password)']) !!}
							@if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
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