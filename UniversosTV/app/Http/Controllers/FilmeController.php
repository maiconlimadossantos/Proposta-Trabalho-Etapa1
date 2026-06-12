<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index()
    {
        $filmes = Filme::all();
        return view('filmes.index', compact('filmes'));
    }

    public function create()
    {
        return view('filmes.create');
    }

    public function store(Request $request)
    {
        Filme::create($request->all());
        return redirect()->route('filmes.index')->with('success', 'Filme adicionado com sucesso!');
    }

    public function edit(Filme $filme)
    {
        return view('filmes.edit', compact('filme'));
    }

    public function update(Request $request, Filme $filme)
    {
        $filme->update($request->all());
        return redirect()->route('filmes.index')->with('success', 'Filme atualizado com sucesso!');
    }

    public function destroy(Filme $filme)
    {
        $filme->delete();
        return redirect()->route('filmes.index')->with('success', 'Filme removido com sucesso!');
    }
}
