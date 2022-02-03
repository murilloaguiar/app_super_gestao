<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $uf = ['MG','SP','ES','RJ','BA','GO'];
        return [
            'nome'=> $this->faker->name,
            'email'=> $this->faker->unique()->email,
            'site' => 'https://www.'.Str::random(10).'.com',
            'uf' => Arr::random($uf)
        ];
    }
}
