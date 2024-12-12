<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePagamentoRequest;
use App\Http\Requests\UpdatePagamentoRequest;
use App\Models\Pagamento;
use Illuminate\Http\JsonResponse;

class PagamentoController extends Controller
{
    public function index(): JsonResponse
    {
        $pagamentos = Pagamento::with('venda')->get();
        return response()->json($pagamentos);
    }

    public function store(StorePagamentoRequest $request): JsonResponse
    {
        $dados = $request->all();
        $pagamento = Pagamento::create($dados);
        return response()->json(['message' => 'Pagamento ' . $pagamento->pagamento . ' salvo com sucesso!']);
    }

    public function show(Pagamento $pagamento): JsonResponse
    {
        $pagamento->load('venda');
        return response()->json($pagamento);
    }

    public function update(UpdatePagamentoRequest $request, Pagamento $pagamento): JsonResponse
    {
        $dados = $request->all();
        $pagamento->update($dados);
        return response()->json(['message' => 'Pagamento' . $pagamento->pagamento . ' atualizado com sucesso!']);
    }

    public function destroy(Pagamento $pagamento): JsonResponse
    {
        $pagamento->delete();
        return response()->json(['message' => 'Pagamento deletado com sucesso!']);
    }
}
