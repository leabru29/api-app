<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'cnpj' => fake()->cnpj,
            'logradouro' => fake()->streetName(),
            'numero' => rand(0, 999),
            'complemento' => fake()->streetSuffix(),
            'bairro' => fake()->lastName(),
            'cidade' => fake()->city(),
            'uf' => 'SP'
        ];
    }
}
