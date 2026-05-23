<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;
class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();
        return view('generos.index', compact('generos'));
    }

    public function store(Request $GeneroRequest)
    {
        Genero::create($GeneroRequest->validated());
        return redirect()->route('generos.index')->with('success', 'Genero criado com sucesso!');
    }
    public function Update(Request $GeneroRequest, $idGenero)
    {
        $genero = Genero::find($idGenero);
        $genero->Update(['Genero'=>$GeneroRequest->Genero]);
    }
    public function destroy($idGenero)
    {
        $genero = Genero::find($idGenero);
        $genero->delete();
    }
}
