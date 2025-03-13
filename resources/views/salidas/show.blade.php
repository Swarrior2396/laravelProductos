@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Salida</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Factura de Venta: {{ $salida->factura_venta }}</h5>
            
            <p><strong>Cliente:</strong> {{ $salida->cliente->nombre }}</p>
            <p><strong>Producto:</strong> {{ $salida->producto->nombre }}</p>
            <p><strong>Cantidad:</strong> {{ $salida->cantidad }}</p>
            <p><strong>Fecha de Salida:</strong> {{ $salida->created_at->format('d/m/Y H:i') }}</p>

            <a href="{{ route('salidas.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('salidas.edit', $salida->id) }}" class="btn btn-primary">Editar</a>

            <form action="{{ route('salidas.destroy', $salida->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta salida?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
