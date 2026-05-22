<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('animes.index', compact('animes'));
    }

    public function show($id)
    {
        $anime=Anime::With('genero')->get()->find($id);
        return view('animes.show', compact('anime'));
    }
    public function Update()
    {
       
    }
}
