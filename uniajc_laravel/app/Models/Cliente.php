<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'celular',
        'direccion',
        'documento_tipo',
        'documento_numero',
        'fecha_nacimiento',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'fecha_nacimiento' => 'date'
    ];
}