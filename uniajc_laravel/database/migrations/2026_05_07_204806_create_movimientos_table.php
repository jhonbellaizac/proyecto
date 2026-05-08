<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimientos', function (Blueprint $table) {

            $table->id();

            // PRODUCTO
            $table->unsignedInteger('producto_id');

            // USUARIO
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // TIPO
            $table->enum('tipo', ['entrada', 'salida']);

            // CANTIDAD
            $table->integer('cantidad');

            // OBSERVACIÓN
            $table->text('descripcion')->nullable();

            $table->timestamps();

            // RELACIÓN PRODUCTO
            $table->foreign('producto_id')
                  ->references('id_producto')
                  ->on('producto')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};