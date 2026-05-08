<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('producto', function (Blueprint $table) {

            $table->unsignedBigInteger('marca_id')->after('stock');

            $table->foreign('marca_id')
                  ->references('id')
                  ->on('marcas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('producto', function (Blueprint $table) {

            $table->dropForeign(['marca_id']);

            $table->dropColumn('marca_id');
        });
    }
};