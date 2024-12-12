<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_lista_todas_as_categorias(): void
    {
        $fornecedores = Fornecedor::factory(2)->create();
        foreach ($fornecedores as $fornecedor) {
            $categorias = Categoria::factory(5)->create(['fornecedor_id' => $fornecedor->id]);
            foreach ($categorias as $categoria) {
                $produtos = Produto::factory(5)->create(['categoria_id' => $categoria->id]);
            }
        }

        $response = $this->get(route('categoria.index'));

        $response->assertOk();
        $response->assertJsonStructure([
            '*' => [
                'nome',
                'fornecedor' => [
                    'nome'
                ],
                'produtos' => [
                    '*' => [
                        'nome'
                    ]
                ]
            ]
        ]);
    }
}
