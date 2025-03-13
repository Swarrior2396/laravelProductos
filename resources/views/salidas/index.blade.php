@extends('layouts.app')

@section('title', 'Listado de Salidas')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Salidas</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('salidas.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Registrar Nueva Salida
        </a>
        <a href="{{ route('salidas.trashed') }}" class="btn btn-secondary">
            <i class="fa fa-trash"></i> Ver Salidas Eliminadas
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Factura Venta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($salidas as $salida)
                <tr>
                    <td>{{ $salida->id }}</td>
                    <td>{{ $salida->producto->nombre }}</td>
                    <td>{{ $salida->cliente->nombre }}</td>
                    <td>{{ $salida->fecha }}</td>
                    <td>{{ $salida->cantidad }}</td>
                    <td>{{ $salida->factura_venta }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('salidas.show', $salida->id) }}" class="btn btn-info btn-sm">
                                Ver <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('salidas.edit', $salida->id) }}" class="btn btn-warning btn-sm">
                                Editar <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('salidas.destroy', $salida->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta salida?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay salidas registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
