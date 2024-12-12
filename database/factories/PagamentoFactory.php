<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PagamentoFactory extends Factory
{
    public function definition(): array
    {
        $pagamento = ['aprovado', 'estornado', 'cancelado'];
        return [
            'pagamento' => $pagamento[array_rand($pagamento)]
        ];
    }
}
