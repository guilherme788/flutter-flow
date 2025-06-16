<?php

namespace App\Http\Controllers;

use App\Models\Preso;
use Illuminate\Http\Request;

class PresoController extends Controller
{
    public function index()
    {
        $presos = Preso::with('cela')->get();
        return response()->json([
            'status' => 'success',
            'data' => $presos
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'documento_identidade' => 'required|string',
            'data_nascimento' => 'required|date',
            'crime' => 'required|string',
            'data_condenacao' => 'required|date',
            'status' => 'required|string',
            'cela_id' => 'required|exists:celas,id',
        ]);

        $preso = Preso::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Preso criado com sucesso.',
            'data' => $preso
        ], 201);
    }

    public function show(Preso $preso)
    {
        $preso->load('cela');
        return response()->json([
            'status' => 'success',
            'data' => $preso
        ]);
    }

    public function update(Request $request, Preso $preso)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|required|string',
            'documento_identidade' => 'sometimes|required|string',
            'data_nascimento' => 'sometimes|required|date',
            'crime' => 'sometimes|required|string',
            'data_condenacao' => 'sometimes|required|date',
            'status' => 'sometimes|required|string',
            'cela_id' => 'sometimes|required|exists:celas,id',
        ]);

        $preso->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Preso atualizado com sucesso.',
            'data' => $preso
        ]);
    }

    public function destroy(Preso $preso)
    {
        $preso->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Preso deletado com sucesso.'
        ]);
    }
}
