<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->string('id_proveedor');
            $table->foreign('id_proveedor')
            ->references('nit')
            ->on('proveedores');
      $table->foreignId('id_producto')
            ->references('id')
            ->on('productos');
            $table->string('factura_compra');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('total', 12, 2);
            $table->timestamps();
            $table->softDeletes(); // Para implementar SoftDeletes
        });
    }

    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}