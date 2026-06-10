@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Gerenciamento de Filmes</h1>
    <a href="{{ route('movies.create') }}" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded font-medium text-sm transition">
        + Adicionar Filme
    </a>
</div>

<div class="bg-gray-900 rounded-lg overflow-hidden border border-gray-800">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-800 text-gray-400 text-xs uppercase font-mono border-b border-gray-800">
                <th class="p-4">Capa</th>
                <th class="p-4">Título / Diretor</th>
                <th class="p-4">Gênero</th>
                <th class="p-4">Ano / Duração</th>
                <th class="p-4">Áudio</th>
                <th class="p-4">Status</th>
                <th class="p-4 text-center">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800 text-sm">
            @foreach($movies as $movie)
            <tr class="hover:bg-gray-800/30">
                <td class="p-4">
                    <img src="{{ $movie->capa ?? 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=80' }}"
                         class="w-12 h-16 object-cover rounded border border-gray-700">
                </td>
                <td class="p-4">
                    <div class="font-medium text-purple-400 text-base">{{ $movie->titulo }}</div>
                    <div class="text-xs text-gray-500">Direção: {{ $movie->diretor }}</div>
                </td>
                <td class="p-4 text-gray-300">
                    <span class="px-2 py-1 bg-gray-800 rounded text-xs border border-gray-700">
                        {{ $movie->genero->nome ?? 'Sem Gênero' }}
                    </span>
                </td>
                <td class="p-4 text-gray-400">
                    <div>{{ $movie->ano_lancamento }}</div>
                    <div class="text-xs text-gray-500">{{ substr($movie->duracao, 0, 5) }} hrs</div>
                </td>
                <td class="p-4 space-x-1">
                    @if($movie->dublado) <span class="bg-blue-900/40 text-blue-400 text-[10px] px-1.5 py-0.5 rounded border border-blue-800">DUB</span> @endif
                    @if($movie->legendado) <span class="bg-yellow-900/40 text-yellow-400 text-[10px] px-1.5 py-0.5 rounded border border-yellow-800">LEG</span> @endif
                </td>
                <td class="p-4">
                    @if($movie->disponivel)
                        <span class="text-green-400 text-xs flex items-center">● Disponível</span>
                    @else
                        <span class="text-red-400 text-xs flex items-center">○ Indisponível</span>
                    @endif
                </td>
                <td class="p-4 flex justify-center space-x-3 pt-9">
                    <a href="{{ route('movies.edit', $movie->id) }}" class="text-blue-400 hover:text-blue-300 font-medium">Editar</a>

                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Excluir este filme permanentemente?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($movies->isEmpty())
            <tr>
                <td colspan="7" class="p-8 text-center text-gray-500">Nenhum filme cadastrado.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection