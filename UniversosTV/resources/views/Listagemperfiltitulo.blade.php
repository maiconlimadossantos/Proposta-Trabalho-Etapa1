@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold">Histórico e Avaliações por Perfil</h1>
        <p class="text-gray-400 text-xs mt-1">Controle de mídias assistidas e interações dos perfis.</p>
    </div>
    <a href="{{ route('profile-titles.create') }}" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded font-medium text-sm transition">
        + Vincular Novo Conteúdo
    </a>
</div>

<div class="bg-gray-900 rounded-lg overflow-hidden border border-gray-800">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-800 text-gray-400 text-xs uppercase font-mono border-b border-gray-800">
                <th class="p-4">ID</th>
                <th class="p-4">Perfil</th>
                <th class="p-4">Título Vinculado</th>
                <th class="p-4">Tipo</th>
                <th class="p-4">Status</th>
                <th class="p-4">Avaliação</th>
                <th class="p-4 text-center">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800 text-sm">
            @foreach($profileTitles as $item)
            <tr class="hover:bg-gray-800/30">
                <td class="p-4 text-gray-500 font-mono">{{ $item->id }}</td>
                <td class="p-4 font-semibold text-purple-400">{{ $item->perfil->nome ?? 'Desconhecido' }}</td>
                <td class="p-4 text-white font-medium text-base">{{ $item->titulo_nome }}</td>
                <td class="p-4">
                    <span class="bg-gray-800 text-gray-300 px-2 py-0.5 rounded text-xs border border-gray-700">{{ $item->tipo_midia }}</span>
                </td>
                <td class="p-4">
                    @if($item->assistido)
                        <span class="text-green-400 flex items-center gap-1">✔ Concluído</span>
                    @else
                        <span class="text-yellow-500 flex items-center gap-1">⏱ Em Andamento</span>
                    @endif
                </td>
                <td class="p-4 text-yellow-400 font-bold">
                    {{ $item->avaliacao ? str_repeat('⭐', $item->avaliacao) : 'Não Avaliado' }}
                </td>
                <td class="p-4 flex justify-center space-x-3">
                    <a href="{{ route('profile-titles.edit', $item->id) }}" class="text-blue-400 hover:text-blue-300 font-medium">Editar</a>
                    <form action="{{ route('profile-titles.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Remover este item do histórico?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($profileTitles->isEmpty())
            <tr>
                <td colspan="7" class="p-8 text-center text-gray-500">Nenhum registro de título vinculado encontrado.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection