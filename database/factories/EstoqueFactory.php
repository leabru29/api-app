<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstoqueFactory extends Factory
{
    public function definition(): array
    {
        $produto = Produto::inRandomOrder()->first();
        return [
            'produto_id' => $produto->id,
            'quantidade' => rand(1, 10),
            'data_validade' => fake()->date()
        ];
    }
}
