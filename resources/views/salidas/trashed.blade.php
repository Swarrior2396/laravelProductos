@extends('layouts.app')
@section('title', 'Salidas Eliminadas')
@section('content')
    <div class="container">
        <h1 class="text-center">Salidas Eliminadas</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Factura de Venta</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha de Eliminación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salidas as $salida)
                    <tr>
                        <td>{{ $salida->factura_venta }}</td>
                        <td>{{ $salida->cliente->nombre }}</td>
                        <td>{{ $salida->producto->nombre }}</td>
                        <td>{{ $salida->cantidad }}</td>
                        <td>{{ $salida->deleted_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <!-- Restaurar Salida -->
                            <form action="{{ route('salidas.restore', $salida->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning">Restaurar</button>
                            </form>

                            <!-- Eliminar Definitivamente -->
                            <form action="{{ route('salidas.forceDelete', $salida->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('salidas.index') }}" class="btn btn-primary">Volver</a>
    </div>

    <script>
        function confirmDelete() {
            return confirm("¿Está seguro de que desea eliminar esta salida? Esta acción no se puede deshacer.");
        }
    </script>
@endsection
