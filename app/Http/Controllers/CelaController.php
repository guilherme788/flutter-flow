<?php

namespace App\Http\Controllers;

use App\Models\Cela;
use Illuminate\Http\Request;

class CelaController extends Controller
{
    public function index()
    {
        $celas = Cela::all();
        return response()->json([
            'status' => 'success',
            'data' => $celas
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|unique:celas',
            'capacidade' => 'required|integer',
            'descricao' => 'nullable|string',
        ]);

        $cela = Cela::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Cela criada com sucesso.',
            'data' => $cela
        ], 201);
    }

    public function show(Cela $cela)
    {
        return response()->json([
            'status' => 'success',
            'data' => $cela
        ]);
    }

    public function update(Request $request, Cela $cela)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|required|unique:celas,nome,' . $cela->id,
            'capacidade' => 'sometimes|required|integer',
            'descricao' => 'nullable|string',
        ]);

        $cela->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Cela atualizada com sucesso.',
            'data' => $cela
        ]);
    }

    public function destroy(Cela $cela)
    {
        $cela->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Cela deletada com sucesso.'
        ]);
    }
}
