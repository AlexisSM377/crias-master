@extends('welcome')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Proveedores activos</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->email }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>
                                <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-fw fa-eye"></i></a>
                                <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-fw fa-pen"></i></a>
                                <form action="{{ route('proveedores.destroy',$proveedor->id) }}" method="POST">   
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