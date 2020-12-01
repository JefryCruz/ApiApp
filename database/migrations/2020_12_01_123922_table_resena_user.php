<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// @codingStandardsIgnoreLine
class TableResenaUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_resena_user', function (Blueprint $table) {
            $table->id('id_resena_user');
            $table->date('fecha')->nullable();
            $table->integer('id_usuario')->nullable(false);
            $table->integer('id_usuario_receptor')->nullable(false);
            $table->text('descripcion')->nullable(false);
            $table->decimal('calificacion', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_resena_user');
    }
}
