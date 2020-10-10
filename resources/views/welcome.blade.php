@extends('dashboard.app')

@section('title','Dalia')

@section('titlepage')
    <div class="mt-5 mb-5 display-3 text-center">
        Gestor de Archivos de Clientes - (GAC)
    </div>
@endsection

@section('content')
    <div class="card shadow p-2 mb-4 bg-white rounded">
        <div class="card-header d-flex justify-content-md-end">
            <h5 class="card-title mr-auto">Buscar cliente</h5>
            <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#AddClient">
                Agregar <i class="fas fa-user-plus"></i>
            </a>
        </div>
        <div class="card-body ml-lg-auto mr-lg-auto">
            <div class="form-group">
                <label for="documento">Documento: </label>
                <form action="{{route('cliente.search')}}" method="POST">
                @csrf
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
                    <input type="search" class="form-control" name="documento" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Buscar <i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    @include('client.modal-add-client')
@endsection