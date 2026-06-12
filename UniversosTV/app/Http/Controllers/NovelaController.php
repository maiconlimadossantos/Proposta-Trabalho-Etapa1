<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novela;

class NovelaController extends Controller
{
    public function index()
    {
        $novelas = Novela::all();
        return view('novelas.index', compact('novelas'));
    }

    public function create()
    {
        return view('novelas.create');
    }

    public function store(Request $request)
    {
        Novela::create($request->all());
        return redirect()->route('novelas.index')->with('success', 'Novela adicionada com sucesso!');
    }

    public function edit(Novela $novela)
    {
        return view('novelas.edit', compact('novela'));
    }

    public function update(Request $request, Novela $novela)
    {
        $novela->update($request->all());
        return redirect()->route('novelas.index')->with('success', 'Novela atualizada com sucesso!');
    }

    public function destroy(Novela $novela)
    {
        $novela->delete();
        return redirect()->route('novelas.index')->with('success', 'Novela removida com sucesso!');
    }
}
