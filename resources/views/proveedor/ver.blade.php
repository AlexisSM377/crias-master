@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Información del proveedor</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p class="card-title font-weight-bold">Nombre</p>
                <p class="card-text">{{ $proveedor->nombre }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Email</p>
                <p class="card-text">{{ $proveedor->email }}</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <p class="card-title font-weight-bold">Telefono</p>
                <p class="card-text">{{ $proveedor->telefono }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Direccion</p>
                <p class="card-text">${{ $proveedor->direccion }}</p>
            </div>
        </div>
    </div>
</div>
@endsection