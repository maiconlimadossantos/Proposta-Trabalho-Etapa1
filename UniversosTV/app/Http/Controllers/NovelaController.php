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

    public function showall()
    {
        $novela=Novela::With('genero')->get();
        return view('novelas.show', compact('novela'));
    }
    public function Update(Request $NovelaRequest, $idNovela)
    {
        $novela = Novela::find($idNovela);
        $novela->Update(['Novela'=>$NovelaRequest->Novela]);
    }
    public function destroy($idNovela)
    {
        $novela = Novela::find($idNovela);
        $novela->delete();
    }

}
