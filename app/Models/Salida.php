<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salida extends Model
{
    use SoftDeletes,HasFactory;

    protected $dates = ['deleted_at']; // Asegura que Laravel maneje esta fecha
    protected $table = 'salidas';

    protected $fillable = ['id_producto',
    'id_cliente',
    'fecha',
    'cantidad',
    'factura_venta'];


    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }

public function cliente()
{
    return $this->belongsTo(Cliente::class, 'id_cliente', 'dni');
}


}
