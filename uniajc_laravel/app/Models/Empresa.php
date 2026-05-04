<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre',
        'nit',
        'razon_social',
        'email',
        'telefono',
        'celular',
        'direccion',
        'ciudad',
        'departamento',
        'pais',
        'sector',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    // Relación: Una empresa tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_empresa');
    }
}