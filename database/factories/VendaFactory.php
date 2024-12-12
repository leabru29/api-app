<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Pagamento;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendaFactory extends Factory
{
    public function definition(): array
    {
        $cliente = Cliente::inRandomOrder()->first();
        $produto = Produto::inRandomOrder()->first();
        $pagamento = Pagamento::inRandomOrder()->first();
        return [
            'cliente_id' => $cliente->id,
            'produto_id' => $produto->id,
            'quantidade' => rand(1, 10),
            'pagamento_id' => $pagamento->id
        ];
    }
}
