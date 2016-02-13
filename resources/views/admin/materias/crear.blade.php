@extends('layouts.app')

@section('title', 'Registrar Materia')

@section('content')
	<div class="container no-padding">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Materia</div>
                <div class="panel-body">
					{!! Form::open(['route'=>'admin.materias.store', 'method'=>'POST']) !!}
							<div class="form-group">
								{!! Form::label('nivel_id', 'Nivel') !!}
								{!! Form::select('nivel_id', $niveles, null, ['class'=>'form-control select-nivel', 'required']) !!}
							</div>

							<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
								{!! Form::label('descripcion', 'Nombre Materia') !!}
								{!! Form::text('descripcion', null, ['class'=>'form-control','placeholder'=>'Nombre de la materia', 'value'=> 'old(descripcion)']) !!}
								@if ($errors->has('descripcion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
							</div>

							<div class="form-group{{ $errors->has('credito') ? ' has-error' : '' }}">
								{!! Form::label('credito', 'Número de Creditos') !!}
								{!! Form::number('credito', null, ['class'=>'form-control','placeholder'=>'Número de créditos', 'value'=> 'old(credito)']) !!}
								@if ($errors->has('credito'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('credito') }}</strong>
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