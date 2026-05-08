<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'provesors';

    protected $fillable = [
        'nombre',
        'telefono',
        'email'
    ];
}