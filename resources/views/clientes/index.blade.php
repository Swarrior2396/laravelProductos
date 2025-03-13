@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Clientes</h1>

    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Agregar Cliente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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
                        <a href="{{ route('clientes.show', $cliente->dni) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente->dni) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->dni) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
