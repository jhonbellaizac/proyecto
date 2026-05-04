<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('nombre')->after('id');
            $table->string('apellido')->nullable()->after('nombre');
            $table->string('email')->unique()->nullable()->after('apellido');
            $table->string('telefono')->nullable()->after('email');
            $table->string('celular')->nullable()->after('telefono');
            $table->text('direccion')->nullable()->after('celular');
            $table->string('documento_tipo')->nullable()->after('direccion'); // CC, CE, NIT, etc.
            $table->string('documento_numero')->nullable()->after('documento_tipo');
            $table->date('fecha_nacimiento')->nullable()->after('documento_numero');
            $table->boolean('activo')->default(true)->after('fecha_nacimiento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn([
                'nombre', 'apellido', 'email', 'telefono', 'celular',
                'direccion', 'documento_tipo', 'documento_numero',
                'fecha_nacimiento', 'activo'
            ]);
        });
    }
};
