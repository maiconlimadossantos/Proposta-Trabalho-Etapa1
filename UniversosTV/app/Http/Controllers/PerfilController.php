<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
class PerfilController extends Controller
{
    public function index()
    {
        $perfis = Perfil::all();
        return view('perfis.index', compact('perfis'));
    }

    public function store(Request $PerfilRequest)
    {
        Perfil::create($PerfilRequest->validated());
        return redirect()->route('perfis.index')->with('success', 'Perfil criado com sucesso!');
    }
    public function Update(Request $PerfilRequest, $idPerfil)
    {
        $perfil = Perfil::find($idPerfil);
        $perfil->Update(['Perfil'=>$PerfilRequest->Perfil]);
    }
    public function destroy($idPerfil)
    {
        $perfil = Perfil::find($idPerfil);
        $perfil->delete();
    }
}
