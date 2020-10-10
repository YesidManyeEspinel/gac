<!-- Modal -->
<div class="modal fade" id="AddFile" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">AGREGAR NUEVO ARCHIVO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('cliente.pdf',$infoClient->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="modal-body">
				<div class="form-row">
				    <div class="form-group col-md-12">
				    	<label for="tipo">Tipo: </label>
		    			<select name="tipo" class="form-control">
				    		<option value=""></option>
							@foreach($list as $type)
				    			<option value="{{$type->id}}">{{$type->nombre}}</option>
							@endforeach
				    	</select>
				    </div>
				    <div class="form-group col-md-12">
				    	<label for="archivo">Archivo (PDF)</label>
				    	<input type="file" class="form-control" name="archivo" value="{{ old('archivo') }}">
				    </div>
				    <input type="hidden" name="documento" value="{{ $infoClient->documento }}">
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