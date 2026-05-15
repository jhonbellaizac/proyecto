<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {

            $table->id('id_detalle');

            // RELACIÓN CON VENTA
            $table->unsignedBigInteger('venta_id');

            // RELACIÓN CON PRODUCTO
            $table->unsignedInteger('producto_id');

            // CANTIDAD
            $table->integer('cantidad');

            // PRECIO UNITARIO
            $table->decimal(
                'precio_unitario',
                10,
                2
            );

            // SUBTOTAL
            $table->decimal(
                'subtotal',
                10,
                2
            );

            $table->timestamps();

            // FOREIGN KEYS
            $table->foreign('venta_id')
                  ->references('id_venta')
                  ->on('ventas')
                  ->onDelete('cascade');

            $table->foreign('producto_id')
                  ->references('id_producto')
                  ->on('producto')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};