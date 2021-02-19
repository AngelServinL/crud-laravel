@extends('layouts.app')
@section('content')

<div class="container">
		

	<h1>FORMULARIO DE EDICION DE ESTUDIANTES</h1>
	<form action="{{ url('/estudiante/'.$estudiante->id_estudiante) }}" method ="post">
	@csrf
	{{ method_field('PATCH')}}
	@include('estudiante.form',['modo'=>'Actualizar'])

	</form>
</div>
@endsection
