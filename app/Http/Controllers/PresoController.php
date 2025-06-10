<?php

namespace App\Http\Controllers;

use App\Models\Preso;
use Illuminate\Http\Request;

class PresoController extends Controller
{
    public function index()
    {
        return Preso::with('cela')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'documento_identidade' => 'required|string',
            'data_nascimento' => 'required|date',
            'crime' => 'required|string',
            'data_condenacao' => 'required|date',
            'status' => 'required|string',
            'cela_id' => 'required|exists:celas,id',
        ]);

        return Preso::create($request->all());
    }

    public function show(Preso $preso)
    {
        return $preso->load('cela');
    }

    public function update(Request $request, Preso $preso)
    {
        $request->validate([
            'nome' => 'sometimes|required|string',
            'documento_identidade' => 'sometimes|required|string',
            'data_nascimento' => 'sometimes|required|date',
            'crime' => 'sometimes|required|string',
            'data_condenacao' => 'sometimes|required|date',
            'status' => 'sometimes|required|string',
            'cela_id' => 'sometimes|required|exists:celas,id',
        ]);

        $preso->update($request->all());

        return $preso;
    }

    public function destroy(Preso $preso)
    {
        $preso->delete();
        return response()->noContent();
    }
}
