@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Dietas eliminadas</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cria</th>
                        <th>Dieta</th>
                        <th>Tratamiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dietas as $dieta)
                        <tr>
                            <td>{{ $dieta->cria->nombre }}</td>
                            <td>{{ $dieta->dieta }}</td>
                            <td>{{ $dieta->tratamiento }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection