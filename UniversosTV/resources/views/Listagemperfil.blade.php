@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold">Gerenciamento de Perfis</h1>
        <p class="text-gray-400 text-xs mt-1">Perfis secundários vinculados às contas dos clientes.</p>
    </div>
    <a href="{{ route('profiles.create') }}" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded font-medium text-sm transition">
        + Adicionar Perfil
    </a>
</div>

<div class="bg-gray-900 rounded-lg overflow-hidden border border-gray-800">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-800 text-gray-400 text-xs uppercase font-mono border-b border-gray-800">
                <th class="p-4">Avatar</th>
                <th class="p-4">Nome do Perfil</th>
                <th class="p-4">Conta Vinculada (Dono)</th>
                <th class="p-4">Classificação</th>
                <th class="p-4 text-center">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800 text-sm">
            @foreach($profiles as $profile)
            <tr class="hover:bg-gray-800/30">
                <td class="p-4">
                    <img src="{{ $profile->avatar ?? 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=80' }}"
                         class="w-10 h-10 object-cover rounded-md border-2 border-purple-500 shadow-md shadow-purple-500/10">
                </td>
                <td class="p-4 font-medium text-white text-base">{{ $profile->nome }}</td>
                <td class="p-4 text-gray-400">
                    <span class="text-gray-200 font-semibold">{{ $profile->usuario->name ?? 'Sem Usuário' }}</span>
                    <div class="text-xs text-gray-500">{{ $profile->usuario->email ?? '' }}</div>
                </td>
                <td class="p-4">
                    @if($profile->is_infatil)
                        <span class="bg-yellow-900/40 text-yellow-400 border border-yellow-700/60 text-xs px-2 py-0.5 rounded-full font-mono">INFANTIL</span>
                    @else
                        <span class="bg-blue-900/40 text-blue-400 border border-blue-700/60 text-xs px-2 py-0.5 rounded-full font-mono">ADULTO</span>
                    @endif
                </td>
                <td class="p-4 flex justify-center space-x-3 pt-6">
                    <a href="{{ route('profiles.edit', $profile->id) }}" class="text-blue-400 hover:text-blue-300 font-medium">Editar</a>

                    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" onsubmit="return confirm('Excluir este perfil permanentemente?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($profiles->isEmpty())
            <tr>
                <td colspan="5" class="p-8 text-center text-gray-500">Nenhum perfil cadastrado até o momento.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection