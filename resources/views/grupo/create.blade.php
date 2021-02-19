@extends('layouts.app')
@section('content')

<div class="container">
		

	<h1>PAGINA DE REGISTRO DE GRUPOS</h1>

	<form action="{{ url('/grupo') }}" method="post" enctype="multipart/form-data">
	@csrf

	@include('grupo.form',['modo'=>'Registrar'])
	</form>
</div>
@endsection