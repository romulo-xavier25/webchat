<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnuncioTiposDePlano extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncio_tipos_de_plano', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anuncio_id')->unsigned();
            $table->foreign('anuncio_id')
                                ->references('id')
                                ->on('anuncios')
                                ->onDelete('cascade');
            $table->bigInteger('tipo_de_planos_id')->unsigned();
            $table->foreign('tipo_de_planos_id')
                                ->references('id')
                                ->on('tipo_de_planos')
                                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncio_tipos_de_plano');
    }
}
