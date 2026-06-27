<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // 2. Página para Adicionar Usuário
    public function create()
    {
        return view('CadastrarUsuario');
    }

    // Ação que salva o usuário adicionado
    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('Listagemusuario')->with('success', 'Usuário adicionado com sucesso!');
    }

    // 3. Página para Editar Usuário
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Ação que atualiza o usuário editado
    public function update(UserRequest $request, User $user)
    {
        $data = $request->only(['name', 'email']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // 4. Ação para Remover Usuário
    public function destroy(User $user)
    {
        if (Auth::check() && Auth::user()->id === $user->id) {
        if (Auth::check() && Auth::user()->id === $user->id) {
            return redirect()->route('users.index')->with('error', 'Você não pode remover seu próprio usuário.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!');
    }
}
}
