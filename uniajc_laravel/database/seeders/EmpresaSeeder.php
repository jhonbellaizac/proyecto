<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresas = [
            [
                'nombre' => 'Tecnología Avanzada S.A.S.',
                'nit' => '901234567-1',
                'razon_social' => 'Tecnología Avanzada S.A.S.',
                'email' => 'contacto@tecnologiaavanzada.com',
                'telefono' => '6012345678',
                'celular' => '3001234567',
                'direccion' => 'Carrera 15 #45-67, Bogotá',
                'ciudad' => 'Bogotá',
                'departamento' => 'Cundinamarca',
                'pais' => 'Colombia',
                'sector' => 'Tecnología',
                'activo' => true
            ],
            [
                'nombre' => 'Distribuciones Industriales Ltda.',
                'nit' => '902345678-2',
                'razon_social' => 'Distribuciones Industriales Ltda.',
                'email' => 'ventas@distribucionesind.com',
                'telefono' => '6045678901',
                'celular' => '3012345678',
                'direccion' => 'Calle 20 #10-20, Medellín',
                'ciudad' => 'Medellín',
                'departamento' => 'Antioquia',
                'pais' => 'Colombia',
                'sector' => 'Distribución',
                'activo' => true
            ],
            [
                'nombre' => 'Servicios Profesionales E.U.',
                'nit' => '903456789-3',
                'razon_social' => 'Servicios Profesionales E.U.',
                'email' => 'info@serviciosprofesionales.com',
                'telefono' => '6056789012',
                'celular' => '3023456789',
                'direccion' => 'Avenida 5 #12-34, Cali',
                'ciudad' => 'Cali',
                'departamento' => 'Valle del Cauca',
                'pais' => 'Colombia',
                'sector' => 'Servicios',
                'activo' => true
            ]
        ];

        foreach ($empresas as $empresa) {
            Empresa::create($empresa);
        }
    }
}