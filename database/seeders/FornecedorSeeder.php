<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Instanciando o Objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com';
        $fornecedor->email = 'contato@fornecedor100.com';
        $fornecedor->uf = 'AM';
        $fornecedor->save();

        // Método create
        Fornecedor::create([
            'nome' => 'Fornecedor 321',
            'site' => 'fornecedor321.com',
            'email' => 'contato@fornecedor321.com',
            'uf' => 'MG'
        ]);

        //Insert
        // \DB::table('fornecedors')->insert([
        //     'nome' => 'Fornecedor 200',
        //     'site' => 'fornecedor200.com',
        //     'email' => 'contato@fornecedor200.com',
        //     'uf' => 'BA'
        // ]);
    }
}
