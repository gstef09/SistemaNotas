@extends('layouts.app')

@section('title', 'Actualizar Materia')

@section('content')
	<div class="container no-padding">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar Materia</div>
                <div class="panel-body">
					{!! Form::open(['route'=>['admin.materias.update', $materia], 'method'=>'PUT']) !!}
							<div class="form-group">
								{!! Form::label('descripcion', 'Descripcion') !!}
								{!! Form::text('descripcion', $materia->descripcion, ['class'=>'form-control','placeholder'=>'Nombre de la materia', 'required']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('credito', 'Creditos') !!}
								{!! Form::number('credito', $materia->credito, ['class'=>'form-control','placeholder'=>'Número de créditos', 'required']) !!}
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