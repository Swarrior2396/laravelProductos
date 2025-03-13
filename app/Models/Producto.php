<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes,HasFactory;

    protected $dates = ['deleted_at']; // Asegura que Laravel maneje esta fecha

    protected $fillable = ['nombre', 'descripcion', 'stock', 'fecha_ingreso'];


// Relación con Entradas
public function entradas()
{
    return $this->hasMany(Entrada::class, 'id_producto');
}

}
