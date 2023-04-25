@extends('welcome')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Actualizacion de datos de sensor</h1>
<div class="card">
  <div class="card-body">
    <form action="{{ route('sensores.update', $sensor->id) }}" method="POST">   
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
            Identificador de la cria:
            <p class="font-weight-bold">{{ $sensor->cria->nombre }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="frecuencia_cardiaca">Frecuencia cardiaca</label>
            <input type="number" class="form-control @error('frecuencia_cardiaca') is-invalid @enderror" id="frecuencia_cardiaca" name="frecuencia_cardiaca" placeholder="Frecuencia cardiaca" value="{{ $sensor->frecuencia_cardiaca }}">
            @error('frecuencia_cardiaca')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="frecuencia_sanguinea">Frecuencia sanguínea</label>
            <input type="number" class="form-control @error('frecuencia_sanguinea') is-invalid @enderror" id="frecuencia_sanguinea" name="frecuencia_sanguinea" placeholder="Frencuencia sanguinea" value="{{ $sensor->frecuencia_sanguinea }}">
            @error('frecuencia_sanguinea')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="frecuencia_respiratoria">Frecuencia respiratoria</label>
            <input type="number" class="form-control @error('frecuencia_respiratoria') is-invalid @enderror" id="frecuencia_respiratoria" name="frecuencia_respiratoria" placeholder="Frecuencia respiratoria" value="{{ $sensor->frecuencia_respiratoria }}">
            @error('frecuencia_respiratoria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="temperatura">Temperatura</label>
            <input type="text" class="form-control @error('temperatura') is-invalid @enderror" id="temperatura" name="temperatura" placeholder="Descripción de la cría" value="{{ $sensor->temperatura }}">
            @error('temperatura')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>
@endsection