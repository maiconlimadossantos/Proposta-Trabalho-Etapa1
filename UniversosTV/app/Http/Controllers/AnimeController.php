<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimeRequest;
use Illuminate\Http\Request;
use App\Models\Anime;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('animes.index', compact('animes'));
    }

    public function create()
    {
        return view('animes.create');
    }

    public function store(AnimeRequest $request)
    {
        Anime::create($request->validated());
        return redirect()->route('animes.index')->with('success', 'Anime adicionado com sucesso!');
    }

    public function edit(Anime $anime)
    {
        return view('animes.edit', compact('anime'));
    }

    public function update(AnimeRequest $request, Anime $anime)
    {
        $anime->update($request->validated());
        return redirect()->route('animes.index')->with('success', 'Anime atualizado com sucesso!');
    }

    public function destroy(Anime $anime)
    {
        $anime->delete();
        return redirect()->route('animes.index')->with('success', 'Anime removido com sucesso!');
    }
}
