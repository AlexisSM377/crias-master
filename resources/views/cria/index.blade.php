@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Crias registradas</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Color muscular</th>
                        <th>Marmoleo</th>
                        <th>Peso</th>
                        <th>Costo</th>
                        <th>Tipo de carne</th>
                        <th>Corral</th>
                        <th>Proveedor</th>
                        <th>En cuarentena</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crias as $cria)
                        <tr>
                            <td>{{ $cria->nombre }}</td>
                            <td>{{ $cria->color_muscular }}</td>
                            <td>{{ $cria->marmoleo }}</td>
                            <td>{{ $cria->peso }} kg</td>
                            <td>${{ $cria->costo }}</td>
                            <td>{{ $cria->clasificacionCarne->nombre }}</td>
                            <td>{{ $cria->corral->nombre }}</td>
                            <td>{{ $cria->proveedor->nombre }}</td>
                            <td>{{ $cria->cria_cuarentena ? 'Si' : 'No' }}</td>
                            <td>
                                <a href="{{ route('crias.show', $cria->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-fw fa-eye"></i></a>
                                <a href="{{ route('crias.edit', $cria->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                <form action="{{ route('crias.destroy',$cria->id) }}" method="POST">   
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-circle btn-sm" type="submit"><i class="fas fa-fw fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection