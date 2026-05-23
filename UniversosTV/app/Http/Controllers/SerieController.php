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

    public function showall()
    {
        $serie=Serie::With('genero')->get();
        return view('series.show', compact('serie'));
    }
    public function store(Request $SerieRequest)
    {
        Serie::create($SerieRequest->validated());
        return redirect()->route('series.index')->with('success', 'Serie criada com sucesso!');
    }
    public function Update(Request $SerieRequest, $idSerie)
    {
        $serie = Serie::find($idSerie);
        $serie->Update(['Serie'=>$SerieRequest->Serie]);
    }
    public function destroy($idSerie)
    {
        $serie = Serie::find($idSerie);
        $serie->delete();
    }
}
