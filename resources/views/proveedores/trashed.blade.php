@extends('layouts.app')
@section('title', 'Eliminados')
@section('content')
    <div class="container">
        <h1 class="text-center">Proveedores Eliminados</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
                            <!-- Restaurar Producto -->
                            <form action="{{ route('proveedores.restore', $proveedor->nit) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning">Restaurar</button>
                            </form>

                            <!-- Eliminar Definitivamente -->
                            <form action="{{ route('proveedores.force-delete', $proveedor->nit) }}" method="POST"
                                style="display:inline-block;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Volver</a>
    </div>

    <script>
        function confirmDelete() {
            return confirm("¿Está seguro de que desea eliminar este proveedor? Esta acción no se puede deshacer.");
        }
    </script>
@endsection