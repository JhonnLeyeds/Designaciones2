@extends('layouts.app')

@section('content')
	<div class="container" >
		  <h2>SELECCION DINAMICA</h2>

		 <div class="form-group col-sm-6">
			{!!  Form::select('facultad' , $facu , null, ['id' => 'facultad']) !!}
		</div>

		<div class="form-group col-sm-6">
		{!! Form::select('carrera'  , ['placeholder' => 'Selecciona tu carrera '],null , ['id' => 'carrera'] ) !!}
		</div>
	</div>

@endsection