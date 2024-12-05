<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\PromocaoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('produtos', [ProdutoController::class, 'index']);
Route::get('produtos/{id}', [ProdutoController::class, 'show']);
Route::post('produtos/store', [ProdutoController::class, 'store']);
Route::put('produtos/update/{id}', [ProdutoController::class, 'update']);
Route::delete('produtos/{id}', [ProdutoController::class, 'destroy']);

Route::get('categorias', [CategoriaController::class, 'index']);
Route::get('categorias/{id}', [CategoriaController::class, 'show']);
Route::post('categorias/store', [CategoriaController::class, 'store']);
Route::put('categorias/update/{id}', [CategoriaController::class, 'update']);

Route::get('promocoes', [PromocaoController::class, 'index']);
Route::get('promocoes/{id}', [PromocaoController::class, 'show']);
Route::post('promocoes/store', [PromocaoController::class, 'store']);
Route::put('promocoes/update/{id}', [PromocaoController::class, 'update']);
Route::delete('promocoes/{id}', [PromocaoController::class, 'destroy']);

