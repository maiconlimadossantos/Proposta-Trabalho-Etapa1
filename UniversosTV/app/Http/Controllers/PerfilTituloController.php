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

    public function create()
    {
        return view('perfilTitulos.create');
    }

    public function store(Request $request)
    {
        PerfilTitulo::create($request->all());
        return redirect()->route('perfilTitulos.index')->with('success', 'PerfilTitulo adicionado com sucesso!');
    }

    public function edit(PerfilTitulo $perfilTitulo)
    {
        return view('perfilTitulos.edit', compact('perfilTitulo'));
    }

    public function update(Request $request, PerfilTitulo $perfilTitulo)
    {
        $perfilTitulo->update($request->all());
        return redirect()->route('perfilTitulos.index')->with('success', 'PerfilTitulo atualizado com sucesso!');
    }

    public function destroy(PerfilTitulo $perfilTitulo)
    {
        $perfilTitulo->delete();
        return redirect()->route('perfilTitulos.index')->with('success', 'PerfilTitulo removido com sucesso!');
    }
}
