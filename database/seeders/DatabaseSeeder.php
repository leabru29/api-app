<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(ClienteSeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(EstoqueSeeder::class);
        $this->call(PagamentoSeeder::class);
        $this->call(VendaSeeder::class);
        $this->call(ColaboradorSeeder::class);
    }
}
