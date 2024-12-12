<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstoqueRequest;
use App\Http\Requests\UpdateEstoqueRequest;
use App\Models\Estoque;
use Illuminate\Http\JsonResponse;

class EstoqueController extends Controller
{
    public function index(): JsonResponse
    {
        $estoques = Estoque::with('produto.categoria.fornecedor')->get();
        return response()->json($estoques);
    }

    public function store(StoreEstoqueRequest $request): JsonResponse
    {
        $dados = $request->all();
        $estoque = Estoque::create($dados);
        return response()->json(['message' => 'Novo estoque do produto ' . $estoque->produto->nome . ' cadastrado com sucesso!']);
    }

    public function show(Estoque $estoque): JsonResponse
    {
        $estoque->load('produto.categoria.fornecedor');
        return response()->json($estoque);
    }

    public function update(UpdateEstoqueRequest $request, Estoque $estoque): JsonResponse
    {
        $dados = $request->all();
        $estoque->update($dados);
        return response()->json(['message' => 'Novo estoque do produto ' . $estoque->produto->nome . ' atualizado com sucesso!']);
    }

    public function destroy(Estoque $estoque): JsonResponse
    {
        $estoque->delete();
        return response()->json(['message' => 'Estoque excluído com sucesso!']);
    }
}
