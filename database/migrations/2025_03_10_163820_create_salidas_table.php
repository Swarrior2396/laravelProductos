<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->string('id_cliente');
            $table->date('fecha');
            $table->integer('cantidad');
            $table->string('factura_venta');
            $table->timestamps();
            $table->softDeletes();
    
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_cliente')->references('dni')->on('clientes');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salidas');
    }
};
