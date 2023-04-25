@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Información del registro del sensor</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p class="card-title font-weight-bold">Idenficador de la cria</p>
                <p class="card-text">{{ $sensor->cria->nombre }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Frecuencia cardiaca</p>
                <p class="card-text">{{ $sensor->frecuencia_cardiaca }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Frecuencia respiratoria</p>
                <p class="card-text">{{ $sensor->frecuencia_respiratoria }}</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <p class="card-title font-weight-bold">Frecuencia sanguinea</p>
                <p class="card-text">{{ $sensor->frecuencia_sanguinea }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">Temperatura</p>
                <p class="card-text">${{ $sensor->temperatura }}</p>
            </div>
            <div class="col">
                <p class="card-title font-weight-bold">¿Cria saludable?</p>
                <p class="card-text">{{ $sensor->saludable ? 'Si' : 'No' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection