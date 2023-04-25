@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Crias eliminadas</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Peso</th>
                        <th>Costo</th>
                        <th>Marmoleo</th>
                        <th>Tipo de carne</th>
                        <th>Corral</th>
                        <th>Proveedor</th>
                        <th>En cuarentena</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crias as $cria)
                        <tr>
                            <td>{{ $cria->nombre }}</td>
                            <td>{{ $cria->descripcion }}</td>
                            <td>{{ $cria->peso }} kg</td>
                            <td>${{ $cria->costo }}</td>
                            <td>{{ $cria->marmoleo }}</td>
                            <td>{{ $cria->clasificacionCarne->nombre }}</td>
                            <td>{{ $cria->corral->nombre }}</td>
                            <td>{{ $cria->proveedor->nombre }}</td>
                            <td>{{ $cria->cria_cuarentena ? 'Si' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection