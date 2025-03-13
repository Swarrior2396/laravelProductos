<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salida extends Model
{
    use SoftDeletes,HasFactory;

    protected $dates = ['deleted_at']; // Asegura que Laravel maneje esta fecha

    protected $fillable = ['id_producto','id_cliente','fecha','cantidad','factura_venta'];


}
