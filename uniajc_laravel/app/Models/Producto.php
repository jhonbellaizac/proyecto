<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $fillable = [
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
}