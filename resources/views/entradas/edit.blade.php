@extends('layouts.app')

@section('title', 'Editar Entrada')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Editar Entrada #{{ $entrada->id }}</h3>
                <a href="{{ route('entradas.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('entradas.update', $entrada->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="factura_compra">Número de Factura:</label>
                            <input type="text" name="factura_compra" id="factura_compra" 
                                class="form-control @error('factura_compra') is-invalid @enderror" 
                                value="{{ old('factura_compra', $entrada->factura_compra) }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="id_proveedor">Proveedor:</label>
                            <select name="id_proveedor" id="id_proveedor" 
                                class="form-control @error('id_proveedor') is-invalid @enderror" required>
                                <option value="">Seleccione un proveedor</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->nit }}" 
                                        {{ old('id_proveedor', optional($entrada->proveedor)->nit) == $proveedor->nit ? 'selected' : '' }}>
                                        {{ $proveedor->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="id_producto">Producto:</label>
                            <select name="id_producto" id="id_producto" 
                                class="form-control @error('id_producto') is-invalid @enderror" required>
                                <option value="">Seleccione un producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}" 
                                        {{ old('id_producto', optional($entrada->producto)->id) == $producto->id ? 'selected' : '' }}>
                                        {{ $producto->nombre }} (Stock actual: {{ $producto->stock }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" name="cantidad" id="cantidad" 
                                class="form-control @error('cantidad') is-invalid @enderror" 
                                value="{{ old('cantidad', $entrada->cantidad) }}" min="1" required>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="precio_unitario">Precio Unitario:</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="precio_unitario" id="precio_unitario" 
                                    class="form-control @error('precio_unitario') is-invalid @enderror" 
                                    value="{{ old('precio_unitario', $entrada->precio_unitario) }}" step="0.01" min="0" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="telefono_proveedor">Teléfono del Proveedor:</label>
                    <input type="text" name="telefono_proveedor" id="telefono_proveedor" 
                        class="form-control @error('telefono_proveedor') is-invalid @enderror" 
                        value="{{ old('telefono_proveedor', optional($entrada->proveedor)->telefono) }}" 
                        pattern="[0-9]+" title="Solo se permiten números" required>
                </div>

                <div class="form-group text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Actualizar Entrada
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cantidadInput = document.getElementById('cantidad');
        const precioUnitarioInput = document.getElementById('precio_unitario');
        const telefonoProveedorInput = document.getElementById('telefono_proveedor');

        // Validar que solo se ingresen números en el campo de teléfono
        telefonoProveedorInput.addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    });
</script>
@endpush
