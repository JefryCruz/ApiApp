<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortafolioUser extends Model
{
    use HasFactory;

    protected $table = 'tbl_portafolio_user';
    
    protected $primary_key = "id_portafolio_user";

    protected $fillable = [
        'descripcion_portafolio->enabled',
    ];
}
