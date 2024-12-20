<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{
    public function index(): JsonResponse
    {
        $categorias = Categoria::with('fornecedor', 'produtos')->get();
        return response()->json($categorias);
    }

    public function store(StoreCategoriaRequest $request): JsonResponse
    {
        $dados = $request->all();
        $categoria = Categoria::create($dados);
        return response()->json(['message' => 'Categoria ' . $categoria->nome . ' cadastrada com sucesso!'], Response::HTTP_CREATED);
    }

    public function show(Categoria $categoria): JsonResponse
    {
        $categoria->load('fornecedor', 'produtos');
        return response()->json($categoria);
    }

    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update($request->validated());
        return response()->json(['message' => 'Categoria ' . $categoria->nome . ' atualizada com sucesso!']);
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json(['message' => 'Categoria excluída com sucesso!']);
    }
}
