@extends('layouts.app')

@section('title', 'Elegir Materias')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Elegir Materias</div>
                <div class="panel-body">
                	{!! Form::open( ['url'=>'/guardarseleccion', 'method'=>'POST']) !!} 
                	{!! csrf_field() !!}
                		<div class="form-group">
                			{!! Form::label('nivel_id', 'Nivel')  !!}
                			{!! Form::select('nivel_id', $niveles, null, ['id'=>'nivel'],['class'=>'form-control select-nivel', 'required']) !!}
                		</div>	

                		<div class="form-group">
                			{!! Form::label('materia_id', 'Materia')  !!}
                			<!-- {!! Form::select( null,['class'=>'form-control select-materia', 'multiple','required']) !!} -->
                		
                        <select class="form-control select-materia" id="materia" multiple required></select>
                    </div>

                		<div class="form-group">
                			{!! Form::label('periodo_id', 'Periodo')  !!}
                			{!! Form::select('periodo_id', $periodos, null, ['class'=>'form-control select-periodo', 'required']) !!}
                		</div>

                		<div class="form-group">
                			{!! Form::label('alumno_id', 'Alumno')  !!}
                			{!! Form::select('alumno_id', $alumnos, null, ['class'=>'form-control select-alumno', 'required']) !!}
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
		$('.select-nivel').chosen({
			placeholder_text_single: 'Seleccione un nivel',
			max_selected_options: 1,
			search_contains: true,
			no_result_text: 'No se encotraro resultados'
		});

		$('.select-materia').chosen({
			placeholder_text_multiple: 'Seleccione un maximo de 7 materias',
			max_selected_options: 7,
			search_contains: true,
			no_result_text: 'No se encotraro resultados'
		});
		$('.select-periodo').chosen({
			placeholder_text_single: 'Seleccione un periodo',
			max_selected_options: 1,
			search_contains: true,
			no_result_text: 'No se encotraro resultados'
		});
        $('.select-alumno').chosen({
            placeholder_text_single: 'Seleccione un nivel',
            max_selected_options: 1,
            search_contains: true,
            no_result_text: 'No se encotraro resultados'
        });
		$('.textarea-content').trumbowyg();
	</script>

@endsection