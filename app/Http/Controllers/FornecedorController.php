<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFornecedorRequest;
use App\Http\Requests\UpdateFornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\JsonResponse;

class FornecedorController extends Controller
{
    public function index(): JsonResponse
    {
        $fornecedores = Fornecedor::with('categorias.produtos')->get();
        return response()->json($fornecedores);
    }

    public function store(StoreFornecedorRequest $request): JsonResponse
    {
        $dados = $request->all();
        $fornecedor = Fornecedor::create($dados);
        return response()->json(['message' => 'Fornecedor ' . $fornecedor->nome . ' cadastrado com sucesso!']);
    }

    public function show(Fornecedor $fornecedor): JsonResponse
    {
        $fornecedor->load('categorias.produtos');
        return response()->json($fornecedor);
    }

    public function update(UpdateFornecedorRequest $request, Fornecedor $fornecedor): JsonResponse
    {
        $dados = $request->all();
        $fornecedor->update($dados);
        return response()->json(['message' => 'Fornecedor ' . $fornecedor->nome . ' atualizado com sucesso!']);
    }

    public function destroy(Fornecedor $fornecedor): JsonResponse
    {
        $fornecedor->delete();
        return response()->json(['message' => 'Fornecedor excluído com sucesso!']);
    }
}
