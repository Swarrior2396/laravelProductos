@extends('layouts.app')

@section('title', 'Detalle del Proveedor')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detalle del Proveedor</h2>

    <div class="card">
        <div class="card-header">
            <h4>{{ $proveedor->nombre }}</h4>
        </div>
        <div class="card-body">
            <p><strong>NIT:</strong> {{ $proveedor->nit }}</p>
            <p><strong>Dígito de Verificación:</strong> {{ $proveedor->digito_verificacion }}</p>
            <p><strong>Correo:</strong> {{ $proveedor->correo }}</p>
            <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
            <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('proveedores.edit', $proveedor->nit) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('proveedores.destroy', $proveedor->nit) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este proveedor?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
