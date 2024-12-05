<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria = Categoria::create($validatedData);

        return response()->json([
            'message' => 'Categoria criado com sucesso!',
            'categoria' => $categoria,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria->update($validatedData);

        return response()->json([
            'message' => 'Categoria atualizada com sucesso!',
            'categoria' => $categoria,
        ]);
    }
}
