<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;

class ClienteController extends Controller
{
    public function index(): JsonResponse
    {
        $clientes = Cliente::with('vendas')->get();
        return response()->json($clientes);
    }

    public function store(StoreClienteRequest $request): JsonResponse
    {
        $dados = $request->all();
        $cliente = Cliente::create($dados);
        return response()->json(['message' => 'Cliente ' . $cliente->nome . ' cadastrado com sucesso!']);
    }

    public function show(Cliente $cliente): JsonResponse
    {
        $cliente->load('vendas');
        return response()->json($cliente);
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente): JsonResponse
    {
        $dados = $request->all();
        $cliente->update($dados);
        return response()->json(['message' => 'Cliente ' . $cliente->nome . ' atualizado com sucesso!']);
    }

    public function destroy(Cliente $cliente): JsonResponse
    {
        $cliente->delete();
        return response()->json(['message' => 'Cliente excluído com sucesso!']);
    }
}
