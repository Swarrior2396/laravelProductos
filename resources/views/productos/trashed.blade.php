@extends('layouts.app')
@section('title', 'Eliminados')
@section('content')
<div class="container">
    <h1 class="text-center">Productos Eliminados</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Fecha Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->fecha_ingreso }}</td>
                    <td>
                        <!-- Restaurar Producto -->
                        <form action="{{ route('productos.restore', $producto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">Restaurar</button>
                        </form>
                        
                        <!-- Eliminar Definitivamente -->
                        <form action="{{ route('productos.force-delete', $producto->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>
</div>

<script>
    function confirmDelete() {
        return confirm("¿Está seguro de que desea eliminar este producto? Esta acción no se puede deshacer.");
    }
</script>
@endsection
