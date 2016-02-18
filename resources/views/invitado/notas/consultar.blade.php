@extends('layouts.app')

@section('title', 'Consultar Notas')

@section('content')
	<div class="container no-padding">
	    <div class="row">
	    	<div class="col-md-8 col-md-offset-2">
		        <div class="panel panel-default">
		            <div class="panel-heading text-center">Consultar Notas</div>
		            <div class="panel-body">
                        {!! Form::open(['url' => 'notas/consultar_notas', 'method'=>'POST']) !!}
                            <div class="form-group">
                                {!! Form::label('aniolectivo_id', 'Año Lectivo')!!}
                                {!! Form::select('aniolectivo_id', $lectivos, null, ['class'=>'form-control select-lectivo', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('periodo_id', 'Periodo')!!}
                                {!! Form::select('periodo_id', $periodos, null, ['class'=>'form-control select-periodo', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('cedula', 'Cedula') !!}
                                {!! Form::text('cedula', null, ['class'=>'form-control','placeholder'=>'Número de Cedula']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Consultar', ['class'=>'btn btn-primary'])!!}
                            </div>
                        {!! Form::close() !!}
		            </div>
		        </div>
		    </div>
	    </div>
	</div>
@endsection

