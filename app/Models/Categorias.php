<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $table = 'tbl_categorias';
    
    protected $primary_key = "id_categoria_trabajo";

    protected $fillable = [
        'nombre_categoria->enabled',
        'alias->enabled',
        'descripcion->enabled'
    ];
}
