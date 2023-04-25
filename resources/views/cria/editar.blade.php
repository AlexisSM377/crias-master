@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Actualización de cría</h1>
<div class="card">
  <div class="card-body">
    @if ($cria->url_imagen != null)
            <img src="{{ asset("images/$cria->url_imagen") }}" class="rounded mx-auto d-block" alt="..." height="300"> 
    @endif
    <form action="{{ route('crias.update', $cria->id) }}" method="POST" enctype="multipart/form-data">   
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre de la cria" value="{{ $cria->nombre }}">
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

                <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
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
            <input type="number" class="form-control @error('peso') is-invalid @enderror" id="peso" name="peso" placeholder="Peso de la cria" value="{{ $cria->peso }}">
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
            <input type="number" class="form-control @error('color_muscular') is-invalid @enderror" id="color_muscular" name="color_muscular" placeholder="Color muscular" value="{{ $cria->color_muscular }}">
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
            <input type="number" class="form-control @error('marmoleo') is-invalid @enderror" id="marmoleo" name="marmoleo" placeholder="Marmoleo de la cría" value="{{ $cria->marmoleo }}">
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
            <input type="number" class="form-control @error('costo') is-invalid @enderror" id="costo" name="costo" placeholder="Costo de la cría" value="{{ $cria->costo }}">
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
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Descripción de la cría" value="{{ $cria->descripcion }}">
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
                <option value="{{$item->id}}" @if ($cria->proveedor_id == $item->id) selected @endif>{{$item->nombre}}</option>
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
                <option value="{{$item->id}}" @if ($cria->corral_id == $item->id) selected @endif>{{$item->nombre}}</option>
            @endforeach
        </select>
        @error('corral')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>
@endsection