@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalle del Producto</h1>

    <div class="card">
        <div class="card-header">
            Producto #{{ $producto->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $producto->nombre }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $producto->stock ?? 'N/A' }}</p>
            <p class="card-text"><strong>Fecha de Ingreso:</strong> {{ $producto->fecha_ingreso }}</p>

            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
