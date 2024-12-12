<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendaRequest;
use App\Http\Requests\UpdateVendaRequest;
use App\Models\Venda;
use Illuminate\Http\JsonResponse;

class VendaController extends Controller
{
    public function index(): JsonResponse
    {
        $vendas = Venda::with('cliente', 'produto.categoria.fornecedor', 'pagamento')->get();
        return response()->json($vendas);
    }

    public function store(StoreVendaRequest $request): JsonResponse
    {
        $dados = $request->all();
        $venda = Venda::create($dados);
        return response()->json(['message' => 'Venda cadastrada ' . $venda->id . ' com sucesso!']);
    }

    public function show(Venda $venda): JsonResponse
    {
        $venda->load('cliente', 'produto.categoria.fornecedor', 'pagamento');
        return response()->json($venda);
    }

    public function update(UpdateVendaRequest $request, Venda $venda): JsonResponse
    {
        $dados = $request->all();
        $venda->update($dados);
        return response()->json(['message' => 'Venda ' . $venda->id . ' atualizada com sucesso!']);
    }

    public function destroy(Venda $venda): JsonResponse
    {
        $venda->delete();
        return response()->json(['message' => 'Venda excluída com sucesso!']);
    }
}
