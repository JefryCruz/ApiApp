<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatosUsuario extends Model
{
    protected $table = 'tbl_datos_usuario';
    
    protected $primary_key = "id_datos_usuario";

    protected $fillable = [
        'nombre->enabled',
        'apellido->enabled',
        'fecha_nacimiento->enabled',
        'telefono->enabled'
    ];
}
