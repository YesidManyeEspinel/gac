@extends('dashboard.app')

@section('title','Dalia')

@section('titlepage')
    <div class="mt-2 mb-3 display-4 text-center">
        Gestor de Archivos de Clientes - (GAC)
    </div>
@endsection

@section('content')
    <div class="card shadow p-2 mb-4 bg-white rounded">
        <div class="card-header d-flex justify-content-md-end">
            <h5 class="card-title mr-auto">Datos cliente</h5>
            <a href="" class="btn btn-outline-success" data-toggle="modal" data-target="#UpdClient">
                Editar <i class="fas fa-user-edit"></i>
            </a>
            <a href="" class="btn btn-outline-info" data-toggle="modal" data-target="#AddFile">
                Agregar <i class="fas fa-file-pdf"></i>
            </a>
            <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#AddCredit">
                Agregar <i class="fas fa-money-check-alt"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="row">
            	<div class="col-5">
            		<p class="h5">Nombres: 
            			<small class="text-muted">{{$infoClient->nombre}}</small>
            		</p>
            		<p class="h5">Apellidos: 
            			<small class="text-muted">{{$infoClient->apellido}}</small>
            		</p>
            		<p class="h5">Documento: 
            			@if($infoClient->tipo == 'cc' || $infoClient->tipo == 'ti')
            			<small class="text-muted">{{$infoClient->tipo}} {{$infoClient->documento}}</small>
            			@else
            			<small class="text-muted">{{$infoClient->documento}}</small>
            			@endif
            		</p>
            		<p class="h5">Telefono: 
            			<small class="text-muted">{{$infoClient->telefono}}</small>
            		</p>
            		<p class="h5">Cupo de credito: 
            			<small class="text-muted">${{number_format($infoClient->cupo)}} COP</small>
            		</p>
            		<p class="h5">Observaciones: 
            			<small class="text-muted">{{$infoClient->observacion}}</small>
            		</p>
            		<p class="h5">Actualizado: 
            			<small class="text-muted">{{$infoClient->updated_at}}</small>
            		</p>
            	</div>
            	<div class="col-7">
            		<table class="table table-striped table-sm mt-0 mb-0">
						<thead>
						    <tr>
						    	<th scope="col">VALOR</th>
						    	<th scope="col">CREDITO</th>
						    	<th scope="col">VIGENTE</th>
                                <th scope="col">ACTUALIZADO</th>
						    	<th scope="col"><i class="fas fa-cogs"></i></th>
						    </tr>
						</thead>
					  	<tbody>
    						@foreach($credits as $credit)
    						<tr>
								<th scope="row">${{ number_format($credit->credito) }}</th>
								<td>{{ $credit->tipocredito->nombre }}</td>
								@if($credit->vigente == 'SI')
								<td>
									<span class="btn btn-outline-success btn-sm">
										<i class="fas fa-power-off"></i>
									</span>
								</td>
								@else
								<td>
									<span class="btn btn-outline-danger btn-sm">
										<i class="fas fa-power-off"></i>
									</span>
								</td>
								@endif
                                <td>{{ $credit->updated_at }}</td>
								<td>
                                    <a onclick="swalConfirm('{{route('credit.edit',$credit->id)}}')" class="text-info btn btn-outline-info btn-sm" >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
						    </tr>
    						@endforeach
					  	</tbody>
					</table>
					{{$credits->render()}}
            	</div>
            </div>
        </div>
    </div>
    <div class="row">
    	
    	@foreach($pdfs as $pdf)
    	<div class="col-4 m-0 p-0">
    	<div class="card rounded m-1">
    		<div class="card-header d-flex justify-content-md-end p-2">
    			<p class="h6 card-title mr-auto">{{ $pdf->tipoarchivo->nombre }}</p>
    			<a href="{{ asset('storage') }}/{{$infoClient->documento}}/{{$pdf->nombre}}" class="btn btn-outline-info p-1" target="_blank">
                Ver <i class="fas fa-eye"></i>
            	</a>
    		</div>
    		<div class="card-body pt-1 pb-1">
    			<p class="h6">Creacion: 
    				<small class="text-muted">
    					{{ $pdf->created_at }}
    				</small>
    			</p>
    			<p class="h6">Actualizacion: 
    				<small class="text-muted">
    					{{ $pdf->updated_at }}
    				</small>
    			</p>
    		</div>
    	</div>
    	</div>
		@endforeach
		
    </div>

    @include('client.modal-add-file')
    @include('client.modal-add-credit')
    @include('client.modal-upd-client')

    <script type="text/javascript">
      function swalConfirm(dato){
        var id = dato;
        
        swal({
            title: "ACTUALIZAR CREDITO",
            text: "Seguro de actualizar credito?",
            icon: "warning",
            buttons: true,
            dangerMode: false,
          })
          .then((willDelete) => {
            if (willDelete) {
              location.replace(`${id}`);
              
            } else {
              swal("Tu registro esta seguro!");
            }
          });
      }
    </script>
@endsection