@extends('layouts.app')

@section('title', 'Lista de Proveedores')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Lista de Proveedores</h2>
    
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">Agregar Proveedor</a>
    <a href="{{ route('proveedores.trashed') }}" class="btn btn-secondary mb-3">Proveedores eliminados</a>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>NIT</th>
                <th>Dígito Verificación</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->nit }}</td>
                    <td>{{ $proveedor->digito_verificacion }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->correo }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>
                        <a href="{{ route('proveedores.show', $proveedor->nit) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('proveedores.edit', $proveedor->nit) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('proveedores.destroy', $proveedor->nit) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este proveedor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
