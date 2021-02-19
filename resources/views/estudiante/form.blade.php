	
@if(count($errors)>0)

	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li> 
			@endforeach
		</ul>
		
	</div>
	
@endif


<table class="table table-light" >
	<tbody>
		<tr>
			<th><label for="nombre">Nombre(s):</label></th>
			<th><input type="text" name="nombre" id="nombre" placeholder = "Ingresa el nombre" pattern = "[A-Za-zà-ù ]{1,25}" required autocomplete = "off" value="{{ isset($estudiante->nombre)?$estudiante->nombre:old('nombre')}}"> <br> </th>
		</tr>
		<tr>
			<th><label for="apellido_pa">Apellido Paterno:</label></th>
			<th><input type="text" name="apellido_pa" id="apellido_pa" placeholder = "Ingresa el apellido paterno" pattern = "[A-Za-zà-ù ]{1,25}" required autocomplete = "off" value="{{ isset($estudiante->apellido_pa)?$estudiante->apellido_pa:old('apellido_pa')}}"></th>
		</tr>
		<tr>
			<th><label for="apellido_ma">Apellido Materno:</label></th>
			<th><input type="text" name="apellido_ma" id="apellido_ma" placeholder = "Ingresa el apellido materno" pattern = "[A-Za-zà-ù ]{1,25}" required autocomplete = "off" value="{{ isset($estudiante->apellido_ma)?$estudiante->apellido_ma:old('apellido_ma')}}"> </th>
		</tr>
		<tr>
			<th><label for="edad">Edad:</label></th>
			<th><input type="text" name="edad" id="edad" placeholder = "Ingresa la edad" pattern = "[0-9]{1,25}" required autocomplete = "off" value="{{ isset($estudiante->edad)?$estudiante->edad:old('edad')}}"> </th>
		</tr>
		<tr>
			<th><label for="email">Email:</label></th>
			<th><input type="text" name="email" id="email" placeholder = "Ingresa el email" pattern = "[A-Za-z0-9-_@.]{1,20}" required autocomplete = "off" value="{{ isset($estudiante->email)?$estudiante->email:old('email')}}"> </th>
		</tr>
		<tr>
			<th><label for="telefono">Telefono:</label></th>
			<th><input type="text" name="telefono" id="telefono" placeholder = "Ingresa el telefono" pattern = "[0-9+ ]{1,15}" required autocomplete = "off" value="{{ isset($estudiante->telefono)?$estudiante->telefono:old('telefono')}}"> </th>
		</tr>
		<tr>
			<th><label for="grupo">Grupo:</label></th>
			<th><input type="text" name="id_grupo" id="id_grupo" placeholder = "Ingresa el grupo" pattern = "[0-9]{1,11}" required autocomplete = "off" value="{{ isset($estudiante->id_grupo)?$estudiante->id_grupo:old('id_grupo')}}"> </th>
		</tr>
		<tr>
			<th><input class="btn btn-warning" type="submit" value="{{ $modo }} Datos" ></th>
			<th><a href="{{ url('estudiante/') }}" class="btn btn-primary">Regresar</a></th>
		</tr>
	</tbody>

	
	
</table>