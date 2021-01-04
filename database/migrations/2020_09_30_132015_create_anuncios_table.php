<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                                ->references('id')
                                ->on('users')
                                ->onDelete('cascade');
            $table->bigInteger('tipo_de_planos_id')->unsigned();
            $table->foreign('tipo_de_planos_id')
                                ->references('id')
                                ->on('tipo_de_planos')
                                ->onDelete('cascade');
            $table->string('logotipo');
            $table->string('fotoCapa');
            $table->string('nome_da_empresa');
            $table->string('descricao');
            $table->string('servicos');
            $table->string('cpf');
            $table->string('cnpj');
            $table->string('telefone_principal');
            $table->string('telefone_adicional');
            $table->string('endereco');
            $table->string('numero'); // campo referente ao numero da casa/apartamento
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');

            $table->string('link_facebook');
            $table->string('link_twitter');
            $table->string('link_youtube');
            $table->string('link_site');
            $table->string('link_instagram');
            $table->string('link_linkedin');
            $table->string('telefone_whatsapp');
            $table->string('email');

            $table->string('domingo_abre');
            $table->string('domingo_fecha');
            $table->string('segunda_abre');
            $table->string('segunda_fecha');
            $table->string('terca_abre');
            $table->string('terca_fecha');
            $table->string('quarta_abre');
            $table->string('quarta_fecha');
            $table->string('quinta_abre');
            $table->string('quinta_fecha');
            $table->string('sexta_abre');
            $table->string('sexta_fecha');
            $table->string('sabado_abre');
            $table->string('sabado_fecha');

            $table->string('slug');
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
        Schema::dropIfExists('anuncios');
    }
}
