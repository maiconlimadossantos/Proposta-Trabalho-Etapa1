@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Gerenciamento de Usuários</h1>
    <a href="{{ route('users.create') }}" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded font-medium text-sm transition">
        + Adicionar Usuário
    </a>
</div>

<div class="bg-gray-900 rounded-lg overflow-hidden border border-gray-800">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-800 text-gray-400 text-xs uppercase font-mono border-b border-gray-800">
                <th class="p-4">ID</th>
                <th class="p-4">Nome</th>
                <th class="p-4">E-mail</th>
                <th class="p-4 text-center">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800 text-sm">
            @foreach($users as $user)
            <tr class="hover:bg-gray-800/30">
                <td class="p-4 text-gray-500">{{ $user->id }}</td>
                <td class="p-4 font-medium">{{ $user->name }}</td>
                <td class="p-4 text-gray-400">{{ $user->email }}</td>
                <td class="p-4 flex justify-center space-x-3">
                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-400 hover:text-blue-300 font-medium">Editar</a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este usuário?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection