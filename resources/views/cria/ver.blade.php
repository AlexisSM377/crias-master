@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Información de la cría</h1>
<div class="card">
    <div class="card-body">
        @if ($cria->url_imagen != null)
            <img src="{{ asset("images/$cria->url_imagen") }}" class="rounded mx-auto d-block" alt="..." height="300"> 
        @endif
        <div class="row">
            <div class="col">
                <p class="card-title font-weight-bold">Nombre</p>
                <p class="card-text">{{ $cria->nombre }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Peso</p>
                <p class="card-text">{{ $cria->peso }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Color de musculo</p>
                <p class="card-text">{{ $cria->color_muscular }}</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <p class="card-title font-weight-bold">Marmoleo</p>
                <p class="card-text">{{ $cria->marmoleo }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Costo</p>
                <p class="card-text">${{ $cria->costo }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">¿Cria en cuarentena?</p>
                <p class="card-text">{{ $cria->cria_cuarentena ? 'Si' : 'No' }}</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <p class="card-title font-weight-bold">Descripción</p>
                <p class="card-text">{{ $cria->descripcion }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Proveedor</p>
                <p class="card-text">{{ $cria->proveedor->nombre }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Proceso</p>
                <p class="card-text">{{ $cria->proceso->nombre }}</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-4">
                <p class="card-title font-weight-bold">Clasificación de carne</p>
                <p class="card-text">{{ $cria->clasificacionCarne->nombre }}</p>
            </div>
            <div class="col-8">
                <p class="card-title font-weight-bold">Corral</p>
                <p class="card-text">{{ $cria->corral->nombre }}</p>
            </div>
        </div>
    </div>
</div>
@endsection