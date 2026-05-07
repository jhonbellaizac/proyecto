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
}