<!-- Modal -->
<div class="modal fade" id="UpdClient" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">ACTUALIZAR CLIENTE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('cliente.edit', $infoClient->id)}}" method="POST">
			@csrf
			@method('PUT')
			<div class="modal-body">
				<div class="form-row">
					<div class="form-group col-md-6">
				    	<label for="nombre">Nombre: </label>
				    	<input type="text" class="form-control" name="nombre" value="{{ $infoClient->nombre }}">
				    </div>
				    <div class="form-group col-md-6">
				    	<label for="apellido">Apellido: </label>
				    	<input type="text" class="form-control" name="apellido" value="{{ $infoClient->apellido }}">
				    </div>
				    <div class="form-group col-md-6">
				    	<label for="documento">Documento: </label>
				    	<div class="input-group">
				    		@if($infoClient->tipo == 'cc' || $infoClient->tipo == 'ti')
	            			<small class="text-muted">{{$infoClient->tipo}} {{$infoClient->documento}}</small>
	            			@else
	            			<small class="text-muted">{{$infoClient->documento}}</small>
	            			@endif
				    	</div>
				    </div>
				    <div class="form-group col-md-6">
				    	<label for="telefono">Telefono:</label>
				    	<input type="tel" class="form-control" name="telefono" value="{{ $infoClient->telefono }}">
				    </div>
				    <div class="form-group col-md-6">
				    	<label for="cupo">Cupo ($COP):</label>
				    	<input type="number" class="form-control" name="cupo" value="{{ $infoClient->cupo }}">
				    </div>
				    <div class="form-group col-md-12">
				    	<label for="observacion">Observacion:</label>
				    	<textarea class="form-control" aria-label="With textarea" name="observacion">
				    		{{ $infoClient->observacion }}
				    	</textarea>
				    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
				<button id="BtnClient" type="submit" class="btn btn-outline-primary">Guardar</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- EndModal -->