@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Historial de registro de sensores</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cria</th>
                        <th>Frecuencia cardiaca</th>
                        <th>Frecuencia sanguinea</th>
                        <th>Frecuencia respiratoria</th>
                        <th>Temperatura</th>
                        <th>Saludable</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sensores as $sensor)
                        <tr>
                            <td>{{ $sensor->cria->nombre }}</td>
                            <td>{{ $sensor->frecuencia_cardiaca }}</td>
                            <td>{{ $sensor->frecuencia_sanguinea }}</td>
                            <td>{{ $sensor->frecuencia_respiratoria }}</td>
                            <td>{{ $sensor->temperatura }}</td>
                            <td>{{ $sensor->saludable ? 'Si' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection