@extends('layouts.app')
@section('title', 'Eliminados')
@section('content')
<div class="container">
    <h1 class="text-center">Clientes Eliminados</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->dni }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->fecha_registro }}</td>
                    <td>
                        <form action="{{ route('clientes.restore',$cliente->dni) }}" method="post" style="display:inline-block;">
                            @csrf
                            @method('PATCH') 
                            <button type="submit" class="btn btn-warning" >Restablecer</button>

                        </form>
                        <form action="{{ route('clientes.force-delete',$cliente->dni) }}" method="post" style="display:inline-block;" onsubmit=" return confirmDelete()">
                            @csrf
                            @method('DELETE') 
                            <button type="submit" class="btn btn-warning" >Eliminar</button>
                        </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver</a>
</div>

<script>
    function confirmDelete() {
        return confirm("¿Está seguro de que desea eliminar este Cliente? Esta acción no se puede deshacer.");
    }
</script>
@endsection
