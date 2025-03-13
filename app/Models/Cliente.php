<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes,HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'dni';
    protected $dates = ['deleted_at']; // Asegura que Laravel maneje esta fecha
    protected $fillable = ['dni','nombre','correo','telefono','fecha_registro','fecha_actualizacion'];
}
