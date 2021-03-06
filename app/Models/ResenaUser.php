<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResenaUser extends Model
{
    use HasFactory;

    protected $table = 'tbl_categorias';
    
    protected $primary_key = "id_detalle_portafolio";

    protected $fillable = [
        'id_portafolio_user->enabled',
        'fecha_creacion->enabled',
        'n_post->enabled',
        'multimedia->enabled'
    ];
}
