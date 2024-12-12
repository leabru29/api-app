<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    public function definition(): array
    {
        $fornecedor = Fornecedor::inRandomOrder()->first();
        $categoria = Categoria::inRandomOrder()->first();

        return [
            'nome' => fake()->firstName(),
            'descricao' => fake()->text(),
            'preco' => fake()->randomFloat(1, 1, 100),
            'fornecedor_id' => $fornecedor->id,
            'categoria_id' => $categoria->id
        ];
    }
}
