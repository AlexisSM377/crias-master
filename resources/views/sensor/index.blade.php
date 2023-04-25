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
                        <th>Registrado el</th>
                        <th>Acciones</th>
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
                            <td>{{ $sensor->created_at }}</td>
                            <td>
                                @if ($sensor->cria->has('dieta') == null)
                                    @if ($sensor->saludable == false )
                                        <a href="{{route('dietas.crear',$sensor->cria_id)}}" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-syringe"></i>
                                        </a>
                                    @endif
                                @endif
                                @if ($sensor->cria->has('dieta') == null)
                                    <a href="{{ route('sensores.edit', $sensor->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                @endif
                                <a href="{{ route('sensores.show', $sensor->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-fw fa-eye"></i></a>
                                @if ($sensor->cria->has('dieta') == null)
                                    <form action="{{ route('sensores.destroy',$sensor->id) }}" method="POST">   
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-circle btn-sm" type="submit"><i class="fas fa-fw fa-trash"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection