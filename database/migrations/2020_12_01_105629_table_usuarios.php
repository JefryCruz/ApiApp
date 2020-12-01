<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// @codingStandardsIgnoreLine
class TableUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('usuario')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('imagen_usuario')->nullable();
            $table->integer('id_datos_usuario')->nullable(false);
            $table->integer('id_detalle_categorias')->nullable();
            $table->integer('id_portafolio_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_usuario');
    }
}
