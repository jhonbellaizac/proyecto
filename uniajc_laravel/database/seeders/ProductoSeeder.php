<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Laptop Gaming Pro',
                'codigo' => 'LAP-GAM-001',
                'precio' => 2500000.00,
                'stock' => 15,
                'categoria_id' => 1, // Electrónicos
                'descripcion' => 'Laptop gaming de alto rendimiento con procesador Intel i7, 16GB RAM, 512GB SSD y tarjeta gráfica RTX 3060'
            ],
            [
                'nombre' => 'Smartphone Galaxy S23',
                'codigo' => 'SPH-SAM-002',
                'precio' => 1800000.00,
                'stock' => 25,
                'categoria_id' => 1, // Electrónicos
                'descripcion' => 'Smartphone Samsung Galaxy S23 con pantalla AMOLED 6.1", 256GB almacenamiento y cámara de 50MP'
            ],
            [
                'nombre' => 'Camiseta Deportiva Nike',
                'codigo' => 'CAM-NIK-003',
                'precio' => 85000.00,
                'stock' => 50,
                'categoria_id' => 2, // Ropa y Accesorios
                'descripcion' => 'Camiseta deportiva Nike Dri-FIT de poliéster transpirable, talla M, color azul'
            ],
            [
                'nombre' => 'Juego de Ollas Tramontina',
                'codigo' => 'OLL-TRA-004',
                'precio' => 320000.00,
                'stock' => 12,
                'categoria_id' => 3, // Hogar y Jardín
                'descripcion' => 'Set de 7 piezas de ollas Tramontina con revestimiento antiadherente, incluye sartenes y cacerolas'
            ],
            [
                'nombre' => 'Balón de Fútbol Adidas',
                'codigo' => 'BAL-ADI-005',
                'precio' => 120000.00,
                'stock' => 30,
                'categoria_id' => 4, // Deportes y Recreación
                'descripcion' => 'Balón de fútbol Adidas Tango tamaño 5, oficial FIFA, color blanco con negro'
            ],
            [
                'nombre' => 'Libro "Laravel para Principiantes"',
                'codigo' => 'LIB-LAR-006',
                'precio' => 45000.00,
                'stock' => 20,
                'categoria_id' => 5, // Libros y Educación
                'descripcion' => 'Libro completo sobre desarrollo web con Laravel, incluye ejemplos prácticos y proyectos'
            ],
            [
                'nombre' => 'Crema Hidratante Nivea',
                'codigo' => 'CRE-NIV-007',
                'precio' => 25000.00,
                'stock' => 40,
                'categoria_id' => 6, // Salud y Belleza
                'descripcion' => 'Crema hidratante Nivea para piel seca, 200ml, con vitamina E y aceite de jojoba'
            ],
            [
                'nombre' => 'Aceite para Motor 5W30',
                'codigo' => 'ACE-MOT-008',
                'precio' => 65000.00,
                'stock' => 35,
                'categoria_id' => 7, // Automotriz
                'descripcion' => 'Aceite sintético para motor 5W30, grado API SN, botella de 1 litro, compatible con motores a gasolina'
            ],
            [
                'nombre' => 'Taladro Inalámbrico Bosch',
                'codigo' => 'TAL-BOS-009',
                'precio' => 280000.00,
                'stock' => 8,
                'categoria_id' => 8, // Herramientas
                'descripcion' => 'Taladro inalámbrico Bosch GSB 18V-60, 2 velocidades, incluye batería y cargador'
            ],
            [
                'nombre' => 'Audífonos Inalámbricos Sony',
                'codigo' => 'AUD-SON-010',
                'precio' => 350000.00,
                'stock' => 18,
                'categoria_id' => 1, // Electrónicos
                'descripcion' => 'Audífonos inalámbricos Sony WH-1000XM4 con cancelación de ruido activa y 30 horas de batería'
            ]
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}