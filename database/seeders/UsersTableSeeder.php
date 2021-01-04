<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome'              => 'romulo xavier',
            'email'             => 'romulo@lasswelldigital.com.br',
            'genero'            => 'Masculino',
            'condominio'        => '',
            'quantidade_unidades' => 0,
            'mandato_inicio'    => '',
            'mandato_fim'       => '',
            'ata_eleicao'       => '',
            'telefone'          => '85982086226',
            'endereco'          => 'rua curitiba',
            'numero'            => '417',
            'complemento'       => 'proximo ao expresso grill',
            'bairro'            => 'Dom Lustosa',
            'cep'               => '60526-035',
            'cidade'            => 'fortaleza',
            'estado'            => 'ceará',
            'password'          => bcrypt('123'),
            'tipo_de_usuario'   => 'Fornecedor',
            'foto'              => 'romulo-perfil-foto_1603472297.png',
        ]);

        User::create([
            'nome'              => 'marcio teste',
            'email'             => 'marcio2@lasswelldigital.com.br',
            'genero'            => 'Masculino',
            'condominio'        => 'raio de sol',
            'quantidade_unidades' => 12,
            'mandato_inicio'    => '15-10-2021',
            'mandato_fim'       => '15-10-2022',
            'ata_eleicao'       => 'ataSindicoRomulo151020212022.pdf',
            'telefone'          => '85997497660',
            'endereco'          => 'Av. Dom Luís',
            'numero'            => '1200',
            'complemento'       => 'proximo ao shopping del passeio',
            'bairro'            => 'meireles',
            'cep'               => '60160-230',
            'cidade'            => 'fortaleza',
            'estado'            => 'ceará',
            'password'          => bcrypt('123'),
            'tipo_de_usuario'   => 'Síndico',
            'foto'              => 'marcio_1603742788.jpg',
        ]);

        User::create([
            'nome'              => 'Marcio Lasswell',
            'email'             => 'marcio@lasswelldigital.com.br',
            'genero'            => 'Masculino',
            'condominio'        => '',
            'quantidade_unidades' => 0,
            'mandato_inicio'    => '',
            'mandato_fim'       => '',
            'ata_eleicao'       => '',
            'telefone'          => '85982086226',
            'endereco'          => 'rua curitiba',
            'numero'            => '417',
            'complemento'       => 'proximo ao expresso grill',
            'bairro'            => 'Dom Lustosa',
            'cep'               => '60526-035',
            'cidade'            => 'fortaleza',
            'estado'            => 'ceará',
            'password'          => bcrypt('123'),
            'tipo_de_usuario'   => 'Fornecedor',
            'foto'              => 'marcio_1603742788.jpg',
        ]);
    }
}
