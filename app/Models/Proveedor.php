<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Proveedor extends Model
{
    use SoftDeletes,HasFactory;
    protected $table = 'proveedores';
    protected $primaryKey = 'nit';
    protected $dates = ['deleted_at']; // Asegura que Laravel maneje esta fecha
    protected $fillable = ['nit','digito_verificacion','nombre','correo','telefono','direccion'];

    // Relación con Entradas
public function entradas()
{
    return $this->hasMany(Entrada::class, 'id_proveedor');
}
}
