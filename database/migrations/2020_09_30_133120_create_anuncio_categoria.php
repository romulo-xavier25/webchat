<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnuncioCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncio_categoria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anuncio_id')->unsigned();
            $table->foreign('anuncio_id')
                                ->references('id')
                                ->on('anuncios')
                                ->onDelete('cascade');
            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')
                                ->references('id')
                                ->on('categorias')
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
        Schema::dropIfExists('anuncio_categoria');
    }
}
