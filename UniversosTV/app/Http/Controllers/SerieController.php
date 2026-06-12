<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        Serie::create($request->all());
        return redirect()->route('series.index')->with('success', 'Série adicionada com sucesso!');
    }

    public function edit(Serie $serie)
    {
        return view('series.edit', compact('serie'));
    }

    public function update(Request $request, Serie $serie)
    {
        $serie->update($request->all());
        return redirect()->route('series.index')->with('success', 'Série atualizada com sucesso!');
    }

    public function destroy(Serie $serie)
    {
        $serie->delete();
        return redirect()->route('series.index')->with('success', 'Série removida com sucesso!');
    }
}
