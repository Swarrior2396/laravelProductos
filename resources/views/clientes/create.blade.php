@extends('layouts.app')

@section('title', 'Agregar Cliente')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" maxlength="13" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>

        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
            <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let fechaInput = document.getElementById("fecha_registro");
        let telefonoInput = document.getElementById("telefono");

        let today = new Date().toISOString().split("T")[0]; 
        let minDate = "2000-01-01"; 

        fechaInput.value = today; 
        fechaInput.setAttribute("min", minDate);
        fechaInput.setAttribute("max", today);

        telefonoInput.addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, ''); // Remueve todo lo que no sea número
        });
    });
</script>
@endsection
