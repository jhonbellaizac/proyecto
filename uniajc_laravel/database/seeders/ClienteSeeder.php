<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            [
                'nombre' => 'Juan Carlos',
                'apellido' => 'Pérez López',
                'email' => 'juan.perez@email.com',
                'telefono' => '6012345678',
                'celular' => '3001234567',
                'direccion' => 'Carrera 10 #25-30, Bogotá',
                'documento_tipo' => 'CC',
                'documento_numero' => '12345678',
                'fecha_nacimiento' => '1985-03-15',
                'activo' => true
            ],
            [
                'nombre' => 'María José',
                'apellido' => 'García Rodríguez',
                'email' => 'maria.garcia@email.com',
                'telefono' => '6023456789',
                'celular' => '3012345678',
                'direccion' => 'Calle 15 #12-45, Medellín',
                'documento_tipo' => 'CC',
                'documento_numero' => '87654321',
                'fecha_nacimiento' => '1990-07-22',
                'activo' => true
            ],
            [
                'nombre' => 'Carlos Alberto',
                'apellido' => 'Martínez Sánchez',
                'email' => 'carlos.martinez@email.com',
                'telefono' => '6034567890',
                'celular' => '3023456789',
                'direccion' => 'Avenida 6N #8-90, Cali',
                'documento_tipo' => 'CC',
                'documento_numero' => '11223344',
                'fecha_nacimiento' => '1982-11-08',
                'activo' => true
            ],
            [
                'nombre' => 'Ana María',
                'apellido' => 'López Hernández',
                'email' => 'ana.lopez@email.com',
                'telefono' => '6045678901',
                'celular' => '3034567890',
                'direccion' => 'Carrera 5 #18-25, Barranquilla',
                'documento_tipo' => 'CC',
                'documento_numero' => '44332211',
                'fecha_nacimiento' => '1995-01-30',
                'activo' => true
            ],
            [
                'nombre' => 'Luis Fernando',
                'apellido' => 'Ramírez Gómez',
                'email' => 'luis.ramirez@email.com',
                'telefono' => '6056789012',
                'celular' => '3045678901',
                'direccion' => 'Transversal 7 #35-40, Cartagena',
                'documento_tipo' => 'CC',
                'documento_numero' => '55667788',
                'fecha_nacimiento' => '1978-09-12',
                'activo' => true
            ],
            [
                'nombre' => 'Tecnología Avanzada S.A.S.',
                'apellido' => null,
                'email' => 'compras@tecnologiaavanzada.com',
                'telefono' => '6011111111',
                'celular' => '3001111111',
                'direccion' => 'Carrera 15 #45-67, Bogotá',
                'documento_tipo' => 'NIT',
                'documento_numero' => '901234567-1',
                'fecha_nacimiento' => null,
                'activo' => true
            ]
        ];

        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}