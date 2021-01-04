<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDePlano;

class TipoDePlanoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDePlano::create([
            'tipo_do_plano' => 'gratuito',
        ]);

        TipoDePlano::create([
            'tipo_do_plano' => 'basico',
        ]);

        TipoDePlano::create([
            'tipo_do_plano' => 'profissional',
        ]);

        TipoDePlano::create([
            'tipo_do_plano' => 'premium',
        ]);
    }
}
