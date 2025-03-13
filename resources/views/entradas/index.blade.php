@extends('layouts.app')

@section('title', 'Entradas de Productos')

@section('content')
<div class="container">
    <h1 class="mb-4">Entradas de Productos</h1>
    
    <a href="{{ route('entradas.create') }}" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i> Nueva Entrada
    </a>
    <a href="{{ route('entradas.trashed') }}" class="btn btn-secondary mb-3">
        <i class="fa fa-trash"></i> Ver Eliminados
    </a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-striped">
        <thead class="table-dark">
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
                        <a href="{{ route('entradas.show', $entrada->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('entradas.destroy', $entrada->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este registro?')">Eliminar</button>
                        </form>
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
@endsection
