<?php

use Illuminate\Database\Seeder;
Use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        //utilizando o método estático create
        Fornecedor::create([
            'nome'=>'Fornecedor 200',
            'site'=> 'fornecedor200.com.br',
            'uf'=>'RS',
            'email'=>'contato@fornecedor200.com.br'
        ]);

        //insert. O eloquent não fornece o preenchimento da data de criação e edição por esse meio
        DB::table('fornecedores')->insert([
            'nome'=>'Fornecedor 300',
            'site'=> 'fornecedor300.com.br',
            'uf'=>'SP',
            'email'=>'contato@fornecedor300.com.br'
        ]);

    }
}
