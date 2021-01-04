<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliarAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliar_anuncios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anuncio_id')->unsigned();
            $table->foreign('anuncio_id')
                                ->references('id')
                                ->on('anuncios')
                                ->onDelete('cascade');
            $table->bigInteger('avaliador_anuncio_id')->unsigned();
            $table->foreign('avaliador_anuncio_id')
                                ->references('id')
                                ->on('users')
                                ->onDelete('cascade');
            $table->integer('nota_avaliacao')->default(0);
            $table->mediumText('comentario');
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
        Schema::dropIfExists('avaliar_anuncios');
    }
}
