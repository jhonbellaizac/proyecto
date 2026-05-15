<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {

            $table->id('id_venta');

            // USUARIO QUE REALIZA LA VENTA
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // CLIENTE
            $table->string('nombre_cliente');

            $table->string('cedula_cliente');

            // TOTAL
            $table->decimal('total', 10, 2)
                  ->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};