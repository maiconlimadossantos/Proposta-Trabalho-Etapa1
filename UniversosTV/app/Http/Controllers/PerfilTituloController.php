<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerfilTitulo;
class PerfilTituloController extends Controller
{
    public function index()
    {
        $perfilTitulos = PerfilTitulo::all();
        return view('perfilTitulos.index', compact('perfilTitulos'));
    }

    public function store(Request $PerfilTituloRequest)
    {
        PerfilTitulo::create($PerfilTituloRequest->validated());
        return redirect()->route('perfilTitulos.index')->with('success', 'PerfilTitulo criado com sucesso!');
    }
    public function Update(Request $PerfilTituloRequest, $idPerfilTitulo)
    {
        $perfilTitulo = PerfilTitulo::find($idPerfilTitulo);
        $perfilTitulo->Update(['PerfilTitulo'=>$PerfilTituloRequest->PerfilTitulo]);
    }
    public function destroy($idPerfilTitulo)
    {
        $perfilTitulo = PerfilTitulo::find($idPerfilTitulo);
        $perfilTitulo->delete();
    }
}
