<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
     
    protected $primaryKey = 'id_producto';

    public $timestamps = false;


    protected $fillable = [
        'marca_id',
        'nombre',
        'codigo',
        'precio',
        'stock',
        'categoria_id',
        'descripcion'
    ];

    // 🔗 Relación con Categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'producto_id', 'id_producto');
    }
}
