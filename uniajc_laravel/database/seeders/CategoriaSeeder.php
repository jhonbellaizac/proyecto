<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Electrónicos',
                'descripcion' => 'Productos electrónicos y dispositivos tecnológicos',
                'activo' => true
            ],
            [
                'nombre' => 'Ropa y Accesorios',
                'descripcion' => 'Prendas de vestir y complementos personales',
                'activo' => true
            ],
            [
                'nombre' => 'Hogar y Jardín',
                'descripcion' => 'Artículos para el hogar y jardín',
                'activo' => true
            ],
            [
                'nombre' => 'Deportes y Recreación',
                'descripcion' => 'Equipos y accesorios deportivos',
                'activo' => true
            ],
            [
                'nombre' => 'Libros y Educación',
                'descripcion' => 'Material educativo y libros',
                'activo' => true
            ],
            [
                'nombre' => 'Salud y Belleza',
                'descripcion' => 'Productos de cuidado personal y salud',
                'activo' => true
            ],
            [
                'nombre' => 'Automotriz',
                'descripcion' => 'Repuestos y accesorios para vehículos',
                'activo' => true
            ],
            [
                'nombre' => 'Herramientas',
                'descripcion' => 'Herramientas manuales y eléctricas',
                'activo' => true
            ]
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}