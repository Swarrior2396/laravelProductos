@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Editar Proveedor</h2>

    <form action="{{ route('proveedores.update', $proveedor->nit) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nit" class="form-label">NIT</label>
            <input type="text" name="nit" class="form-control" value="{{ $proveedor->nit }}" required>
        </div>

        <div class="mb-3">
            <label for="digito_verificacion" class="form-label">Dígito de Verificación</label>
            <input type="text" name="digito_verificacion" class="form-control" value="{{ $proveedor->digito_verificacion }}" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $proveedor->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ $proveedor->correo }}" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $proveedor->telefono }}" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $proveedor->direccion }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
