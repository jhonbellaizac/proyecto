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
        Schema::table('empresas', function (Blueprint $table) {
            $table->string('nombre')->after('id');
            $table->string('nit')->unique()->nullable()->after('nombre');
            $table->string('razon_social')->nullable()->after('nit');
            $table->string('email')->nullable()->after('razon_social');
            $table->string('telefono')->nullable()->after('email');
            $table->string('celular')->nullable()->after('telefono');
            $table->text('direccion')->nullable()->after('celular');
            $table->string('ciudad')->nullable()->after('direccion');
            $table->string('departamento')->nullable()->after('ciudad');
            $table->string('pais')->default('Colombia')->after('departamento');
            $table->string('sector')->nullable()->after('pais'); // Industria, comercio, servicios, etc.
            $table->boolean('activo')->default(true)->after('sector');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn([
                'nombre', 'nit', 'razon_social', 'email', 'telefono', 'celular',
                'direccion', 'ciudad', 'departamento', 'pais', 'sector', 'activo'
            ]);
        });
    }
};
