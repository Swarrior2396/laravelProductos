@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
    <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Entradas de Productos</h3>
        <div>
            <a href="{{ route('entradas.trashed') }}" class="btn btn-warning me-2">
                <i class="fa fa-trash"></i> Ver Eliminados
            </a>
            <a href="{{ route('entradas.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Nueva Entrada
            </a>
        </div>
    </div>
</div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Factura</th>
                            <th>Proveedor</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($entradas as $entrada)
                            <tr>
                                <td>{{ $entrada->id }}</td>
                                <td>{{ $entrada->factura_compra }}</td>
                                <td>{{ $entrada->proveedor->nombre }}</td>
                                <td>{{ $entrada->producto->nombre }}</td>
                                <td>{{ $entrada->cantidad }}</td>
                                <td>${{ number_format($entrada->precio_unitario, 2) }}</td>
                                <td>${{ number_format($entrada->total, 2) }}</td>
                                <td>{{ $entrada->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('entradas.show', $entrada->id) }}" class="btn btn-sm btn-info">
                                            Ver <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-sm btn-warning">
                                            Editar <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('entradas.destroy', $entrada->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar este registro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                               Eliminar <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No hay entradas registradas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection