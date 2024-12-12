<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColaboradorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'cpf' => fake()->cpf()
        ];
    }
}
