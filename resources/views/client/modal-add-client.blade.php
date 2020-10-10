<!-- Modal -->
<div class="modal fade" id="AddClient" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">AGREGAR NUEVO CLIENTE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('cliente.store')}}" method="POST">
			@csrf
			<div class="modal-body">
				<div class="form-row">
					<div class="form-group col-md-6">
				    	<label for="nombre">Nombre: </label>
				    	<input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
				    </div>
				    <div class="form-group col-md-6">
				    	<label for="apellido">Apellido: </label>
				    	<input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}">
				    </div>
				    <div class="form-group col-md-6">
				    	<label for="documento">Documento: </label>
				    	<div class="input-group">
				    		<div class="input-group-addon">
				    			<select name="tipo" class="form-control">
						    		<option value="cc">CC</option>
						    		<option value="ti">TI</option>
						    		<option value="nit">NIT</option>
						    		<option value="ce">CE</option>
						    		<option value="pp">PP</option>
						    	</select>
				    		</div>
				    		<input type="text" class="form-control" name="documento" value="{{ old('documento') }}">
				    	</div>
				    </div>
				    <div class="form-group col-md-6">
				    	<label for="telefono">Telefono:</label>
				    	<input type="tel" class="form-control" name="telefono" value="{{ old('telefono') }}">
				    </div>
				    <div class="form-group col-md-6">
				    	<label for="cupo">Cupo ($COP):</label>
				    	<input type="number" class="form-control" name="cupo" value="50000000">
				    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
				<button id="BtnClient" type="submit" class="btn btn-outline-primary">Agregar</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- EndModal -->