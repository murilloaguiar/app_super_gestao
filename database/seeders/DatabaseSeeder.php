<?php

namespace Database\Seeders;

use App\Models\Unidade;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([FornecedorSeeder::class,
        MotivoContatoSeeder::class,
        SiteContatoSeeder::class,
        ClienteSeeder::class,
        UnidadeSeeder::class]
        );
    }
}
