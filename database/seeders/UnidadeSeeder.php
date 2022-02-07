<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::create([
            'unidade'=>'g',
            'descricao' => 'gramas'
        ]);
        Unidade::create([
            'unidade'=>'kg',
            'descricao' => 'kilo'
        ]);
        Unidade::create([
            'unidade'=>'cm',
            'descricao' => 'centrimetro'
        ]);
        Unidade::create([
            'unidade'=>'m',
            'descricao' => 'metro'
        ]);
    }
}
