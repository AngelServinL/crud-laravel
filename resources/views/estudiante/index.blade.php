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

	<h1>ESTUDIANTES</h1>


	<table class="table table-light">
		<thead> 
			<tr>
				<th>#</th>
				<th>Nombre(s)</th> 
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Edad</th>
				<th>Email</th>
				<th>Telefono</th>
				<th>Grupo</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach($estudiantes as $estudiante)
			<tr>
				<td>{{ $estudiante->id_estudiante }}</td>
				<td>{{ $estudiante->nombre }}</td>
				<td>{{ $estudiante->apellido_pa }}</td>
				<td>{{ $estudiante->apellido_ma }}</td>
				<td>{{ $estudiante->edad }}</td>
				<td>{{ $estudiante->email }}</td>
				<td>{{ $estudiante->telefono }}</td>
				
				<td>{{ $estudiante->id_grupo }}</td>
				<td> 
					<a href="{{ url('/estudiante/'.$estudiante->id_estudiante.'/edit') }}" class="btn btn-success">Editar</a>
					 |   

					<form action="{{ url( '/estudiante/'.$estudiante->id_estudiante ) }}" class="d-inline" method="post">
						@csrf
						{{ method_field('DELETE') }}
						<input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('¿EStas seguro de eliminar los datos?')">			
					</form>
					
				</td>
			</tr>
			@endforeach
			
		</tbody>

	</table>
	<?php echo $estudiantes->render(); ?>
</div>
@endsection