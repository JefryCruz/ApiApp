<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatosUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into tbl_datos_usuario (nombre, apellido, fecha_nacimiento, telefono) 
        values (?, ?, ?, ?)', ['Jefry', 'Cruz', '31/31/31', '3131-3131']);
    }
}
