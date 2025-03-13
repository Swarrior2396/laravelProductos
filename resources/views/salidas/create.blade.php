@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Salida</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salidas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->dni }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_producto" class="form-label">Producto</label>
            <select name="id_producto" id="id_producto" class="form-control" required>
                <option value="">Seleccione un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}" data-stock="{{ $producto->stock }}">
                        {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required>
            <small class="text-danger" id="stock-warning" style="display: none;">No hay suficiente stock disponible.</small>
        </div>

        <div class="mb-3">
            <label for="factura_venta" class="form-label">Factura de Venta</label>
            <input type="text" name="factura_venta" id="factura_venta" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Salida</button>
        <a href="{{ route('salidas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let productoSelect = document.getElementById('id_producto');
        let cantidadInput = document.getElementById('cantidad');
        let stockWarning = document.getElementById('stock-warning');

        productoSelect.addEventListener('change', function () {
            let selectedOption = productoSelect.options[productoSelect.selectedIndex];
            let stock = selectedOption.getAttribute('data-stock');

            cantidadInput.setAttribute('max', stock);
        });

        cantidadInput.addEventListener('input', function () {
            let selectedOption = productoSelect.options[productoSelect.selectedIndex];
            let stock = selectedOption.getAttribute('data-stock');

            if (parseInt(cantidadInput.value) > parseInt(stock)) {
                stockWarning.style.display = 'block';
                cantidadInput.value = stock; // Restringir al stock máximo
            } else {
                stockWarning.style.display = 'none';
            }
        });
    });
</script>

@endsection
