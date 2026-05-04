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
        Schema::table('provesors', function (Blueprint $table) {
            $table->string('nombre')->after('id');
            $table->string('razon_social')->nullable()->after('nombre');
            $table->string('nit')->unique()->nullable()->after('razon_social');
            $table->string('email')->nullable()->after('nit');
            $table->string('telefono')->nullable()->after('email');
            $table->string('celular')->nullable()->after('telefono');
            $table->text('direccion')->nullable()->after('celular');
            $table->string('ciudad')->nullable()->after('direccion');
            $table->string('contacto_principal')->nullable()->after('ciudad');
            $table->string('tipo_proveedor')->nullable()->after('contacto_principal'); // Local, nacional, internacional
            $table->text('productos_suministrados')->nullable()->after('tipo_proveedor');
            $table->boolean('activo')->default(true)->after('productos_suministrados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('provesors', function (Blueprint $table) {
            $table->dropColumn([
                'nombre', 'razon_social', 'nit', 'email', 'telefono', 'celular',
                'direccion', 'ciudad', 'contacto_principal', 'tipo_proveedor',
                'productos_suministrados', 'activo'
            ]);
        });
    }
};
