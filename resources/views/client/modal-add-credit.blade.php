<!-- Modal -->
<div class="modal fade" id="AddCredit" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">AGREGAR NUEVO CREDITO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('cliente.credit',$infoClient->id)}}" method="POST">
			@csrf
			<div class="modal-body">
				<div class="form-row">
				    <div class="form-group col-md-12">
				    	<label for="tipo">Tipo: </label>
		    			<select name="tipo" class="form-control" required>
				    		<option value=""></option>
							@foreach($listc as $type)
				    			<option value="{{$type->id}}">{{$type->nombre}}</option>
							@endforeach
				    	</select>
				    </div>
				    <div class="form-group col-md-12">
				    	<label for="credito">Valor del credito:</label>
				    	<input type="number" class="form-control" name="credito" value="{{ old('credito') }}" required>
				    </div>
				    <div class="form-group col-md-6">
				    	<label for="vigente">Vigente: </label><br>
				    	<div class="btn-group btn-group-toggle" data-toggle="buttons">
			    			<label class="btn btn-outline-success active">
								<input type="radio" name="vigente" value="SI"><i class="fas fa-power-off"></i>
							</label>
							<label class="btn btn-outline-danger">
								<input type="radio" name="vigente" value="NO"> <i class="fas fa-power-off"></i>
							</label>
						</div>
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