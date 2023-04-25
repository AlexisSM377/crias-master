@extends('welcome')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Actualización de dieta de cria</h1>
<div class="card">
  <div class="card-body">
    <form action="{{ route('dietas.update', $dieta->id) }}" method="POST">   
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="cria_id">Identificador de la cria</label>
                <p>{{ $dieta->cria->nombre }}</p>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="tratamiento">Tratamiento</label>
            <input type="text" class="form-control @error('tratamiento') is-invalid @enderror" id="tratamiento" name="tratamiento" placeholder="Tratamiento" value="{{ $dieta->tratamiento }}">
            @error('tratamiento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="dieta">Dieta</label>
            <input type="text" class="form-control @error('dieta') is-invalid @enderror" id="dieta" name="dieta" placeholder="Dieta" value="{{ $dieta->dieta }}">
            @error('dieta')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>
@endsection