<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColaboradorRequest;
use App\Http\Requests\UpdateColaboradorRequest;
use App\Models\Colaborador;
use Illuminate\Http\JsonResponse;

class ColaboradorController extends Controller
{
    public function index(): JsonResponse
    {
        $colaboradores = Colaborador::all();
        return response()->json($colaboradores);
    }

    public function store(StoreColaboradorRequest $request): JsonResponse
    {
        $dados = $request->all();
        $colaborador = Colaborador::create($dados);
        return response()->json(['message' => 'Colaborador ' . $colaborador->nome . ' cadastrado com sucesso!']);
    }

    public function show(Colaborador $colaborador): JsonResponse
    {
        return response()->json($colaborador);
    }

    public function update(UpdateColaboradorRequest $request, Colaborador $colaborador): JsonResponse
    {
        $dados = $request->all();
        $colaborador->update($dados);
        return response()->json(['message' => 'Colaborador ' . $colaborador->nome . ' atualizado com sucesso!']);
    }

    public function destroy(Colaborador $colaborador): JsonResponse
    {
        $colaborador->delete();
        return response()->json(['message' => 'Colaborador excluído com sucesso!']);
    }
}
