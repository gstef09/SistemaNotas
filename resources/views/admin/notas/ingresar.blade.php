@extends('layouts.app')

@section('title', 'Ingresar Notas')

@section('content')
	<div class="container no-padding">
	    <div class="row">
	    	<div class="col-md-8 col-md-offset-2">
		        <div class="panel panel-default">
		            <div class="panel-heading text-center">Ingresar Notas</div>
		            <div class="panel-body">
		            	{!! Form::open(['route'=>'admin.notas.store', 'method'=>'POST']) !!}
		            		{!! csrf_field() !!}
		            		<div class="form-group">
								<label class="">Parcial</label>
								<select class="form-control" name="parcial">
									<option value="1">Parcial uno</option>
									<option value="2">Parcial dos</option>
									<option value="3">Recuperación</option>
								</select>
							</div>

							<div class="form-group">
								{!! Form::label('alumno_id', 'Alumno') !!}
								{!! Form::select('alumno_id', $alumnos, null, ['class'=>'form-control select-alumno', 'required']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('id', 'Materia') !!}
								{!! Form::select('id', $materias->desscripcion, null, ['class'=>'form-control select-materia', 'required']) !!}
							</div> 

							<div class="form-group">
								{!! Form::label('nota1', 'Nota 1') !!}
								{!! Form::number('nota1', '0',['class'=>'form-control','placeholder'=>'Ingrese la nota']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('nota2', 'Nota 2') !!}
								{!! Form::number('nota2', '0', ['class'=>'form-control','placeholder'=>'Ingrese la nota']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('recuperacion', 'Recuperación') !!}
								{!! Form::number('recuperacion', '0', ['class'=>'form-control','placeholder'=>'Ingrese la nota']) !!}
							</div>

							<div class="form-group">
								{!! Form::submit('Guardar', ['class'=>'btn btn-primary'])!!}
							</div>
		            	{!! Form::close() !!}
		            </div>
		        </div>
		    </div>
	    </div>
	</div>
@endsection

@section('js')
	<script type="text/javascript">
		$('.select-alumno').chosen({
			placeholder_text_single: 'Seleccione un alumno',
			max_selected_options: 1,
			search_contains: true,
			no_result_text: 'No se encotraron resultados'
		});

		$('.select-materia').chosen({
			placeholder_text_single: 'Seleccione una materia',
			max_selected_options: 1,
			search_contains: true,
			no_result_text: 'No se encotraron resultados'
		});
	</script>
@endsection