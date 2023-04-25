@extends('welcome')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Registro de proveedor</h1>
<div class="card">
  <div class="card-body">
    <form action="{{ route('proveedores.store') }}" method="POST">   
      @csrf
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="nombre">Nombre de proveedor</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre de proveedor" value="{{ old('nombre') }}">
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email de proveedor" value="{{ old('email') }}">
            @error('email')
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
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" placeholder="Telefono" value="{{ old('telefono') }}">
            @error('telefono')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" placeholder="Direccion del prveedor" value="{{ old('direccion') }}">
            @error('direccion')
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