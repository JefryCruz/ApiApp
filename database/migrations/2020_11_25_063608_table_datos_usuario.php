<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// @codingStandardsIgnoreLine
class TableDatosUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_datos_usuario', function (Blueprint $table) {
            $table->id('id_datos_usuario');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('telefono')->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_datos_usuario');
    }
}
