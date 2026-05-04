<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provesor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedores = [
            [
                'nombre' => 'TechImport S.A.S.',
                'razon_social' => 'TechImport S.A.S.',
                'nit' => '901111111-1',
                'email' => 'compras@techimport.com',
                'telefono' => '6011111111',
                'celular' => '3001111111',
                'direccion' => 'Carrera 7 #23-45, Bogotá',
                'ciudad' => 'Bogotá',
                'contacto_principal' => 'María González',
                'tipo_proveedor' => 'Internacional',
                'productos_suministrados' => 'Electrónicos, Computadores, Accesorios',
                'activo' => true
            ],
            [
                'nombre' => 'Distribuidora Nacional Ltda.',
                'razon_social' => 'Distribuidora Nacional Ltda.',
                'nit' => '902222222-2',
                'email' => 'ventas@distribuidoranacional.com',
                'telefono' => '6022222222',
                'celular' => '3012222222',
                'direccion' => 'Calle 10 #5-67, Medellín',
                'ciudad' => 'Medellín',
                'contacto_principal' => 'Carlos Rodríguez',
                'tipo_proveedor' => 'Nacional',
                'productos_suministrados' => 'Ropa, Calzado, Accesorios',
                'activo' => true
            ],
            [
                'nombre' => 'Proveedores Industriales E.U.',
                'razon_social' => 'Proveedores Industriales E.U.',
                'nit' => '903333333-3',
                'email' => 'contacto@proveedoresind.com',
                'telefono' => '6033333333',
                'celular' => '3023333333',
                'direccion' => 'Avenida 3N #7-89, Cali',
                'ciudad' => 'Cali',
                'contacto_principal' => 'Ana López',
                'tipo_proveedor' => 'Local',
                'productos_suministrados' => 'Herramientas, Materiales de construcción',
                'activo' => true
            ],
            [
                'nombre' => 'Importadora Deportiva S.A.',
                'razon_social' => 'Importadora Deportiva S.A.',
                'nit' => '904444444-4',
                'email' => 'info@importadoradeportiva.com',
                'telefono' => '6044444444',
                'celular' => '3034444444',
                'direccion' => 'Carrera 43 #12-34, Barranquilla',
                'ciudad' => 'Barranquilla',
                'contacto_principal' => 'Pedro Martínez',
                'tipo_proveedor' => 'Internacional',
                'productos_suministrados' => 'Equipos deportivos, Ropa deportiva',
                'activo' => true
            ],
            [
                'nombre' => 'Distribuciones Médicas Ltda.',
                'razon_social' => 'Distribuciones Médicas Ltda.',
                'nit' => '905555555-5',
                'email' => 'ventas@distribucionesmedicas.com',
                'telefono' => '6055555555',
                'celular' => '3045555555',
                'direccion' => 'Transversal 9 #45-67, Cartagena',
                'ciudad' => 'Cartagena',
                'contacto_principal' => 'Laura Sánchez',
                'tipo_proveedor' => 'Nacional',
                'productos_suministrados' => 'Productos de salud, Belleza, Farmacéuticos',
                'activo' => true
            ]
        ];

        foreach ($proveedores as $proveedor) {
            Provesor::create($proveedor);
        }
    }
}
