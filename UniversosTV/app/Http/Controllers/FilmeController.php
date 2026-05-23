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

        public function showall()
        {
            $filme=Filme::With('genero')->get();
            return view('filmes.show', compact('filme'));
        }
        public function store(Request $FilmeRequest)
        {
            Filme::create($FilmeRequest->validated());
            return redirect()->route('filmes.index')->with('success', 'Filme criado com sucesso!');
        }
        public function Update(Request $FilmeRequest, $idFilme)
        {
            $filme = Filme::find($idFilme);
            $filme->Update(['Filme'=>$FilmeRequest->Filme]);
        }
        public function destroy($idFilme)
        {
            $filme = Filme::find($idFilme);
            $filme->delete();
        }
}
