<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneroRequest;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    // 1. Listagem de Gêneros
    public function index()
    {
        $genero = Genero::all();
        return view('genero.index', compact('genero'));
    }

    // 2. Página para Adicionar Gênero
    public function create()
    {
        return view('genero.create');
    }

    // Ação que salva o gênero no banco
    public function store(GeneroRequest $request)
    {


        $data = $request->all();
        $data['ativo'] = $request->has('ativo');

        Genero::create($data);

        return redirect()->route('genero.index')->with('success', 'Gênero adicionado com sucesso!');
    }

    // 3. Página para Editar Gênero (Otimizado com Route Model Binding)
    public function edit(Genero $gender)
    {
        return view('genero.edit', compact('genero'));
    }

    // Ação que atualiza o gênero editado (Otimizado com Route Model Binding)
    public function update(GeneroRequest $request, Genero $gender)
    {


        $data = $request->all();
        $data['ativo'] = $request->has('ativo');

        $gender->update($data);

        return redirect()->route('genero.index')->with('success', 'Gênero atualizado com sucesso!');
    }

    // 4. Ação para Remover Gênero (Otimizado com Route Model Binding)
    public function destroy(Genero $gender)
    {
        $gender->delete();

        return redirect()->route('genders.index')->with('success', 'Gênero removido com sucesso!');
    }
}