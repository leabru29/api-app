<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    public function definition(): array
    {
        $fornecedor = Fornecedor::inRandomOrder()->first();

        return [
            'nome' => fake()->firstName(),
            'fornecedor_id' => $fornecedor->id
        ];
    }
}
