@extends('welcome')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Registro de cría</h1>
<div class="card">
  <div class="card-body">
    <form action="{{ route('crias.store') }}" enctype="multipart/form-data" method="POST">   
      @csrf
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre de la cria" value="{{ old('nombre') }}">
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen" placeholder="Imagen" value="{{ old('imagen') }}">
              @error('imagen')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="peso">Peso</label>
            <input type="number" class="form-control @error('peso') is-invalid @enderror" id="peso" name="peso" placeholder="Peso de la cria" value="{{ old('peso') }}">
            @error('peso')
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
            <label for="color_muscular">Color muscular</label>
            <input type="number" class="form-control @error('color_muscular') is-invalid @enderror" id="color_muscular" name="color_muscular" placeholder="Color muscular" value="{{ old('color_muscular') }}">
            @error('color_muscular')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="marmoleo">Marmoleo</label>
            <input type="number" class="form-control @error('marmoleo') is-invalid @enderror" id="marmoleo" name="marmoleo" placeholder="Marmoleo de la cría" value="{{ old('marmoleo') }}">
            @error('marmoleo')
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
            <label for="costo">Costo</label>
            <input type="number" class="form-control @error('costo') is-invalid @enderror" id="costo" name="costo" placeholder="Costo de la cría" value="{{ old('costo') }}">
            @error('costo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Descripción de la cría" value="{{ old('descripcion') }}">
            @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="proveedor">Proveedor</label>
        <select name="proveedor" id="proveedor" class="form-control @error('proveedor') is-invalid @enderror"">
            <option value="">Selecciona un proveedor </option>
            @foreach ($proveedores as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        @error('proveedor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="corral">Corral</label>
        <select name="corral" id="corral" class="form-control @error('corral') is-invalid @enderror"">
            <option value="">Selecciona un corral</option>
            @foreach ($corrales as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        @error('corral')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>
@endsection