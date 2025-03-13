<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrada extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'entradas';
    protected $fillable = [
        'id_proveedor',
        'id_producto',
        'factura_compra',
        'cantidad',
        'precio_unitario',
        'total'
    ];

    // Relación con Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}