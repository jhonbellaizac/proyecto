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


    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'marca_id',
        'nombre',
        'codigo',
        'precio',
        'stock',
        'id_categoria',
        'descripcion'
    ];

    // 🔗 Relación con Categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'producto_id', 'id_producto');
    }
}
