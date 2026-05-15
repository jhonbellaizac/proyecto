<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $primaryKey = 'id_venta';

    protected $fillable = [
        'user_id',
        'cedula_cliente',
        'nombre_cliente',
        'total'
    ];

    public function detalles()
    {
        return $this->hasMany(
            DetalleVenta::class,
            'venta_id',
            'id_venta'


        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
