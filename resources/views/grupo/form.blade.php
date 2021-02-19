
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
			<th><label for="semestre">Semestre:</label></th>
			<th><input type="text" name="semestre" id="semestre" placeholder = "Ingresa el semestre" pattern = "[A-Za-zà-ù ]{10}" required autocomplete = "off" value="{{ isset($grupo->semestre)?$grupo->semestre:old('semestre')}}"></th>
		</tr>
		<tr>
			<th><label for="grupo">Grupo:</label></th>
			<th><input type="text" name="grupo" id="grupo" placeholder = "Ingresa el grupo" pattern = "[A-Za-z ]{1,5}" required autocomplete = "off" value="{{ isset($grupo->grupo)?$grupo->grupo:old('grupo')}}"> </th>
		</tr>
		<tr>
			<th><label for="turno">Turno:</label></th>
			<th><input type="text" name="turno" id="turno" placeholder = "Ingresa el turno" pattern = "[A-Za-z ]{1,10}" required autocomplete = "off" value="{{ isset($grupo->turno)?$grupo->turno:old('turno')}}"></th>
		</tr>
		<tr>
			<th><input type="submit" class="btn btn-warning" value="{{ $modo }} Datos" ></th>
			<th><a href="{{ url('grupo/') }}" class="btn btn-primary">Regresar</a></th>
		</tr>
	</tbody>
</table>