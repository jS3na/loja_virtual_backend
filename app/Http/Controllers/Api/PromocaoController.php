<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promocao;
use Illuminate\Http\Request;

class PromocaoController extends Controller
{
    public function index()
    {
        return Promocao::with(['produto.categoria'])->get();
    }

    public function show($id)
    {
        return Promocao::findOrFail($id);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'produto_id' => 'required|integer|min:0',
            'descricao' => 'required|string|max:255',
            'preco_promocao' => 'required|numeric|min:0',
        ]);

        $promocao = Promocao::create($validatedData);

        return response()->json([
            'message' => 'Promoção criada com sucesso!',
            'promocao' => $promocao,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $promocao = Promocao::findOrFail($id);

        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'preco_promocao' => 'required|numeric|min:0',

        ]);

        $promocao->update($validatedData);

        return response()->json([
            'message' => 'Promoção atualizada com sucesso!',
            'promocao' => $promocao,
        ]);
    }

    public function destroy($id)
    {
        $promocao = Promocao::findOrFail($id);

        $promocao->delete();

        return response()->json([
            'message' => 'Promoção excluída com sucesso!',
        ]);
    }
}
