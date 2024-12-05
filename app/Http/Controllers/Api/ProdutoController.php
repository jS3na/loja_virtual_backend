<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return Produto::with('categoria')->get();
    }

    public function show($id)
    {
        return Produto::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|integer|min:0',
            'image_url' => 'nullable|string',
        ]);

        $produto = Produto::create($validatedData);

        return response()->json([
            'message' => 'Produto criado com sucesso!',
            'produto' => $produto,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|integer|min:0',
        ]);

        $produto->update($validatedData);

        return response()->json([
            'message' => 'Produto atualizado com sucesso!',
            'produto' => $produto,
        ]);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        $produto->promocoes()->delete();

        $produto->delete();

        return response()->json([
            'message' => 'Produto e suas referências excluídas com sucesso!',
        ]);
    }
}
