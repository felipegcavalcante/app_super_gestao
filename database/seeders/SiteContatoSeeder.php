<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // Método create
        // SiteContato::create([
        //     'nome' => 'Felipe',
        //     'telefone' => '96189-5680',
        //     'email' => 'felipe@gmail.com',
        //     'motivo_contato' => 1,
        //     'mensagem' => 'Gostaria de saber mais detalhes sobre o super gestão'
        // ]);

        SiteContato::factory()->count(100)->create();
    }
}
