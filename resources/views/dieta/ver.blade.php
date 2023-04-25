@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Información de la dieta de la cria</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p class="card-title font-weight-bold">Idenficador de la cria</p>
                <p class="card-text">{{ $dieta->cria->nombre }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Dieta</p>
                <p class="card-text">{{ $dieta->dieta }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Tratamiento</p>
                <p class="card-text">{{ $dieta->tratamiento }}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <p class="card-title font-weight-bold">Fecha de registro de dieta</p>
                <p class="card-text">{{ $dieta->created_at }}</p>
            </div>
        </div>
    </div>
</div>
@endsection