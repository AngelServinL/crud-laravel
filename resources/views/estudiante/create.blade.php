@extends('layouts.app')
@section('content')

<div class="container">
	
	<h1>PAGINA DE REGISTRO DE ESTUDIANTES</h1>
	<form action="{{ url('/estudiante') }}" method="post" enctype="multipart/form-data">
	@csrf
	@include('estudiante.form',['modo'=>'Registrar'])
	</form>
</div>
@endsection