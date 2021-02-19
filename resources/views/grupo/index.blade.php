@extends('layouts.app')
@section('content')

<div class="container">

	<hr><br>

		@if(Session::has('mensaje'))
			<div class="alert alert-success alert-dismissible" role="alert">
				{{ Session::get('mensaje') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif


	<h1>GRUPOS</h1>
		
	<table class="table table-light">
		<thead>
			<tr>
				<th>#</th>
				<th>Semestre</th>
				<th>Grupo</th>
				<th>Turno</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach($grupos as $grupo)
			<tr>
				<td>{{ $grupo->id_grupo }}</td>
				<td>{{ $grupo->semestre }}</td>
				<td>{{ $grupo->grupo }}</td>
				<td>{{ $grupo->turno }}</td>
				<td> 
					<a href="{{ url('/grupo/'.$grupo->id_grupo.'/edit') }}" class="btn btn-success">Editar</a>
					 |  

					<form action="{{ url( '/grupo/'.$grupo->id_grupo ) }}" class="d-inline" method="post">
						@csrf
						{{ method_field('DELETE') }}
						<input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('¿EStas seguro de eliminar los datos?')">			
					</form>
					
				</td>
			</tr>
			@endforeach
		</tbody>

	</table>
</div>
@endsection
