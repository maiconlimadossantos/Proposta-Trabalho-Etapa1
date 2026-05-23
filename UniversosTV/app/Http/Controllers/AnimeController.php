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

    public function showall()
    {
        $anime=Anime::With('genero')->get();
        return view('animes.show', compact('anime'));
    }
    public function store(AnimeRequest $request)
    {
        Anime::create($request->validated());
        return redirect()->route('animes.index')->with('success', 'Anime criado com sucesso!');
    }
    public function Update(Request $AnimeRequest, $idAnime)
    {
        $anime = Anime::find($idAnime);
        $anime->Update(['Anime'=>$AnimeRequest->Anime]);
    }
    public function destroy($idAnime)
    {
        $anime = Anime::find($idAnime);
        $anime->delete();
    }
}
