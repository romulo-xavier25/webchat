<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformarVencimentoAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informar_vencimento_anuncios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anuncio_id')->unsigned();
            $table->foreign('anuncio_id')
                                ->references('id')
                                ->on('anuncios')
                                ->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                                ->references('id')
                                ->on('users')
                                ->onDelete('cascade');
            $table->date('data_aderida');
            $table->date('data_vencimento');
            $table->string('status');
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
        Schema::dropIfExists('informar_vencimento_anuncios');
    }
}
