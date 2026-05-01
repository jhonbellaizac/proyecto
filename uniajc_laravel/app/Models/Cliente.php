<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Cliente extends Model
{
    use HasFactory;

    //1.Especificar el nombre de la tabla
    protected $table = 'cliente';

    //2.Especificar la clave primaria
    protected $primaryKey = 'id_cliente';
    public $timestamps=false;

    //3.Definir las columnas  o campos que se deben asignar masivamente en el 
    protected $fillable = ['nombre','apellido','documento','fecha_nacimiento',
    'direccion','ciudad','telefono','email','id_empresa'];
}
