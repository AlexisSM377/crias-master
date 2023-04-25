@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Dietas registradas</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cria</th>
                        <th>Dieta</th>
                        <th>Tratamiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dietas as $dieta)
                        <tr>
                            <td>{{ $dieta->cria->nombre }}</td>
                            <td>{{ $dieta->dieta }}</td>
                            <td>{{ $dieta->tratamiento }}</td>
                            <td>
                                <a href="{{ route('dietas.show', $dieta->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-fw fa-eye"></i></a>
                                <a href="{{ route('dietas.edit', $dieta->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                <form action="{{ route('dietas.destroy',$dieta->id) }}" method="POST">   
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