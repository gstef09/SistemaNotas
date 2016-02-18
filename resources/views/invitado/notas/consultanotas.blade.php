@extends('layouts.app')

@section('title', 'Concentrado de Notas')

@section('content')
	<div class="container no-padding">
	    <div class="row">
	    	<div class="col-md-8 col-md-offset-2">
		        <div class="panel panel-default">
		            <div class="panel-heading text-center">Concentrado de Notas</div>
		            <div class="panel-body">
						<div class="table-responsive ">
                        <table class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>Materia</th>
                                <th>Parcial 1</th>
                                <th>Parcial 2</th>
                                <th>Recuperación</th>
                                <th>Suma</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
		            </div>
		        </div>
		    </div>
	    </div>
	</div>
@endsection