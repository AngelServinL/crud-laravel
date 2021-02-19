@extends('layouts.app')
@section('content')

<div class="container">
		
	<h1>FORMULARIO DE EDICION DE GRUPOS</h1>
	<form action="{{  url('/grupo/'.$grupo->id_grupo)  }}" method="post">
	@csrf
	{{ method_field('PATCH')}}
	@include('grupo.form',['modo'=>'Actualizar'])

	</form>
</div>
@endsection