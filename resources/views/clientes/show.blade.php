@extends('layouts.app')

@section('title', 'Detalle del Cliente')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalle del Cliente</h1>

    <div class="card">
        <div class="card-header">
            Cliente DNI #{{ $cliente->dni }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $cliente->nombre }}</h5>
            <p class="card-text"><strong>Correo:</strong> {{ $cliente->correo }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
            <p class="card-text"><strong>Fecha de Registro:</strong> {{ $cliente->fecha_registro }}</p>

            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
