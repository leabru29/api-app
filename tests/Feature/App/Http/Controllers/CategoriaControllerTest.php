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

    public function test_cadastro_de_nova_categoria(): void
    {
        $fornecedor = Fornecedor::factory()->create();
        $dados = ['nome' => 'nova categoria', 'fornecedor_id' => $fornecedor->id];

        $response = $this->postJson(route('categoria.store'), $dados);

        $response->assertCreated();
        $response->assertJson(['message' => 'Categoria ' . $dados['nome'] . ' cadastrada com sucesso!']);
        $this->assertDatabaseHas('categorias', $dados);
    }

    public function test_mostrar_um_registro_de_uma_categoria(): void
    {
        $fornecedor = Fornecedor::factory()->create();
        $categoria = Categoria::factory()->create(['fornecedor_id' => $fornecedor->id]);
        Produto::factory()->create(['categoria_id' => $categoria->id]);

        $response = $this->getJson(route('categoria.show', $categoria->id));

        $response->assertOk();
        $response->assertJsonStructure([
            'nome',
            'fornecedor_id',
            'fornecedor' => [
                'nome',
                'cnpj',
                'logradouro',
                'numero',
                'complemento',
                'bairro',
                'cidade',
                'uf'
            ],
            'produtos' => [
                '*' => [
                    'nome'
                ]
            ]
        ]);
    }

    public function test_atualizar_categoria(): void
    {
        $fornecedor1 = Fornecedor::factory()->create();
        $fornecedor2 = Fornecedor::factory()->create();
        $categoria = Categoria::factory()->create(['fornecedor_id' => $fornecedor1->id]);
        $dados = [
            'nome' => 'Categoria atualizada',
            'fornecedor_id' => $fornecedor2->id,
        ];

        $response = $this->putJson(route('categoria.update', ['categoria' => $categoria->id]), $dados);

        $response->assertOk();
        $response->assertJson(['message' => 'Categoria ' . $dados['nome'] . ' atualizada com sucesso!']);
        $this->assertDatabaseMissing('categorias', [
            'nome' => $categoria->nome,
        ]);
        $this->assertDatabaseHas('categorias', [
            'nome' => $dados['nome'],
            'fornecedor_id' => $dados['fornecedor_id'],
        ]);
    }

    public function test_excluir_categoria(): void
    {
        Fornecedor::factory()->create();
        $categoria = Categoria::factory()->create();

        $response = $this->deleteJson(route('categoria.destroy', $categoria->id));

        $response->assertOk();
        $response->assertJson(['message' => 'Categoria excluída com sucesso!']);
        $this->assertDatabaseMissing('categorias', [
            'id' => $categoria->id,
            'nome' => $categoria->nome
        ]);
    }
}
