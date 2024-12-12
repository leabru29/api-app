<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/**
 * No caso da rota de categoria, preciso usar o método parameters porque por padrão os parametros
 * são nomeados como categorium, então tenho que definir como categoria
 */
Route::apiResource('categoria', CategoriaController::class)->parameters([
    'categoria' => 'categoria',
]);
Route::apiResource('cliente', ClienteController::class);
Route::apiResource('colaborador', ColaboradorController::class);
Route::apiResource('estoque', EstoqueController::class);
Route::apiResource('fornecedor', FornecedorController::class);
Route::apiResource('pagamento', PagamentoController::class);
Route::apiResource('produto', ProdutoController::class);
Route::apiResource('venda', VendaController::class);
