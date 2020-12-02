<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// @codingStandardsIgnoreLine
class TableDetallePortafolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detalle_portafolio', function (Blueprint $table) {
            $table->id('id_detalle_portafolio');
            $table->string('id_portafolio_user')->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->integer('n_post')->nullable();
            $table->bigInteger('multimedia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_detalle_portafolio');
    }
}
