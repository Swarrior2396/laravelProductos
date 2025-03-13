@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Detalle de Entrada #{{ $entrada->id }}</h3>
                <div>
                    <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('entradas.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Información de la Compra</h4>
                    <table class="table table-striped">
                        <tr>
                            <th style="width: 200px;">Número de Factura:</th>
                            <td>{{ $entrada->factura_compra }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Compra:</th>
                            <td>{{ $entrada->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Proveedor:</th>
                            <td>{{ $entrada->proveedor->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Producto:</th>
                            <td>{{ $entrada->producto->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Cantidad:</th>
                            <td>{{ $entrada->cantidad }}</td>
                        </tr>
                        <tr>
                            <th>Precio Unitario:</th>
                            <td>${{ number_format($entrada->precio_unitario, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>${{ number_format($entrada->total, 2) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h4>Información del Proveedor</h4>
                    <table class="table table-striped">
                        <tr>
                            <th style="width: 200px;">Nombre:</th>
                            <td>{{ $entrada->proveedor->nombre }}</td>
                        </tr>
                        @if(isset($entrada->proveedor->ruc))
                        <tr>
                            <th>RUC/NIT:</th>
                            <td>{{ $entrada->proveedor->ruc }}</td>
                        </tr>
                        @endif
                        @if(isset($entrada->proveedor->direccion))
                        <tr>
                            <th>Dirección:</th>
                            <td>{{ $entrada->proveedor->direccion }}</td>
                        </tr>
                        @endif
                        @if(isset($entrada->proveedor->telefono))
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $entrada->proveedor->telefono }}</td>
                        </tr>
                        @endif
                        @if(isset($entrada->proveedor->email))
                        <tr>
                            <th>Email:</th>
                            <td>{{ $entrada->proveedor->email }}</td>
                        </tr>
                        @endif
                    </table>
                    
                    <h4>Información del Producto</h4>
                    <table class="table table-striped">
                        <tr>
                            <th style="width: 200px;">Nombre:</th>
                            <td>{{ $entrada->producto->nombre }}</td>
                        </tr>
                        @if(isset($entrada->producto->codigo))
                        <tr>
                            <th>Código:</th>
                            <td>{{ $entrada->producto->codigo }}</td>
                        </tr>
                        @endif
                        @if(isset($entrada->producto->descripcion))
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $entrada->producto->descripcion }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Stock Actual:</th>
                            <td>{{ $entrada->producto->stock }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('entradas.destroy', $entrada->id) }}" method="POST" 
                onsubmit="return confirm('¿Está seguro de eliminar esta entrada? Se ajustará el stock del producto.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Eliminar Entrada
                </button>
            </form>
        </div>
    </div>
</div>
@endsection