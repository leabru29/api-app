<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\JsonResponse;

class ProdutoController extends Controller
{
    public function index(): JsonResponse
    {
        $produtos = Produto::with('categoria.fornecedor')->get();
        return response()->json($produtos);
    }

    public function store(StoreProdutoRequest $request): JsonResponse
    {
        $dados = $request->all();
        $produto = Produto::create($dados);
        return response()->json(['message' => 'Produto ' . $produto->nome . ' cadastrado com sucesso!']);
    }

    public function show(Produto $produto): JsonResponse
    {
        $produto->load('categoria.fornecedor');
        return response()->json($produto);
    }

    public function update(UpdateProdutoRequest $request, Produto $produto): JsonResponse
    {
        $dados = $request->all();
        $produto->update($dados);
        return response()->json(['message' => 'Produto ' . $produto->nome . ' atualizado com sucesso!']);
    }

    public function destroy(Produto $produto): JsonResponse
    {
        $produto->delete();
        return response()->json(['message' => 'Produto deletado com sucesso!']);
    }
}
