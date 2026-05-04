<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'rol' => 'admin',
                'activo' => true,
                'fecha_creacion' => now(),
                'id_empresa' => 1 // Tecnología Avanzada S.A.S.
            ],
            [
                'username' => 'manager',
                'password' => Hash::make('manager123'),
                'rol' => 'manager',
                'activo' => true,
                'fecha_creacion' => now(),
                'id_empresa' => 2 // Distribuciones Industriales Ltda.
            ],
            [
                'username' => 'juan.perez',
                'password' => Hash::make('user123'),
                'rol' => 'user',
                'activo' => true,
                'fecha_creacion' => now(),
                'id_empresa' => 1 // Tecnología Avanzada S.A.S.
            ],
            [
                'username' => 'maria.garcia',
                'password' => Hash::make('user123'),
                'rol' => 'user',
                'activo' => true,
                'fecha_creacion' => now(),
                'id_empresa' => 2 // Distribuciones Industriales Ltda.
            ],
            [
                'username' => 'carlos.martinez',
                'password' => Hash::make('user123'),
                'rol' => 'user',
                'activo' => true,
                'fecha_creacion' => now(),
                'id_empresa' => 3 // Servicios Profesionales E.U.
            ],
            [
                'username' => 'ana.lopez',
                'password' => Hash::make('user123'),
                'rol' => 'user',
                'activo' => true,
                'fecha_creacion' => now(),
                'id_empresa' => 1 // Tecnología Avanzada S.A.S.
            ]
        ];

        foreach ($usuarios as $usuario) {
            Usuario::create($usuario);
        }
    }
}