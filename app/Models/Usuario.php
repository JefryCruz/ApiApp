<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'tbl_usuario';
    
    protected $primary_key = "id_usuario";

    protected $fillable = [
        'usuario->enabled',
        'password->enabled',
        'imagen_usuario->enabled',
        'id_datos_usuario->enabled',
        'id_detalle_categorias->enabled',
        'id_portafolio_user->enabled'
    ];
}
