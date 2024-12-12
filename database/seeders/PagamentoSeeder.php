<?php

namespace Database\Seeders;

use App\Models\Pagamento;
use Illuminate\Database\Seeder;

class PagamentoSeeder extends Seeder
{
    public function run(): void
    {
        Pagamento::factory(4)->create();
    }
}
