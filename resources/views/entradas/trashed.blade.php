@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Entradas Eliminadas</h3>
                <div>
                    <a href="{{ route('entradas.index') }}" class="btn btn-secondary">
                        <i class="fa fa-list"></i> Volver a Entradas
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(count($entradasEliminadas) > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Factura</th>
                                <th>Proveedor</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Fecha Eliminación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entradasEliminadas as $entrada)
                                <tr>
                                    <td>{{ $entrada->id }}</td>
                                    <td>{{ $entrada->factura_compra }}</td>
                                    <td>{{ $entrada->proveedor->nombre }}</td>
                                    <td>{{ $entrada->producto->nombre }}</td>
                                    <td>{{ $entrada->cantidad }}</td>
                                    <td>${{ number_format($entrada->total, 2) }}</td>
                                    <td>{{ $entrada->deleted_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('entradas.restore', $entrada->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success me-1" title="Restaurar">
                                                    <i class="fa fa-trash-restore"></i> Restaurar
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('entradas.forceDelete', $entrada->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar permanentemente este registro?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar permanentemente">
                                                    <i class="fa fa-times-circle"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    No hay entradas eliminadas.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection