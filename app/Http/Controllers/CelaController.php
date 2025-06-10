<?php

namespace App\Http\Controllers;

use App\Models\Cela;
use Illuminate\Http\Request;

class CelaController extends Controller
{
    public function index()
    {
        return Cela::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:celas',
            'capacidade' => 'required|integer',
            'descricao' => 'nullable|string',
        ]);

        return Cela::create($request->all());
    }

    public function show(Cela $cela)
    {
        return $cela;
    }

    public function update(Request $request, Cela $cela)
    {
        $request->validate([
            'nome' => 'sometimes|required|unique:celas,nome,' . $cela->id,
            'capacidade' => 'sometimes|required|integer',
            'descricao' => 'nullable|string',
        ]);

        $cela->update($request->all());

        return $cela;
    }

    public function destroy(Cela $cela)
    {
        $cela->delete();
        return response()->noContent();
    }
}
