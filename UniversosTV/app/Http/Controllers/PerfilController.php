<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilRequest;
use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\User;
class PerfilController extends Controller
{
    public function index()
    {
        $profiles = Perfil::with('usuario')->get();
        return view('perfis.index', compact('perfis'));
    }

    public function create()
    {
        $user = User::all();
        return view('perfis.create');
    }

    public function store(PerfilRequest $request)
    {
        $data = $request->all();
        $data['is_infatil'] = $request->has('is_infatil');

        Perfil::create($data);


        return redirect()->route('perfis.index')->with('success', 'Perfil adicionado com sucesso!');
    }

    public function edit(Perfil $perfil)
    {
        $users = User::all();
        return view('perfis.edit', compact('perfil'));
    }

    public function update(PerfilRequest $request, Perfil $perfil)
    {
        $data = $request->all();
        $data['is_infatil'] = $request->has('is_infatil');

        $perfil->update($data);

        $perfil->update($request->all());
        return redirect()->route('perfis.index')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy(Perfil $perfil)
    {
        $perfil->delete();
        return redirect()->route('perfis.index')->with('success', 'Perfil removido com sucesso!');
    }
}
