@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Gerenciamento de Gêneros</h1>
    <a href="{{ route('genders.create') }}" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded font-medium text-sm transition">
        + Adicionar Gênero
    </a>
</div>

<div class="bg-gray-900 rounded-lg overflow-hidden border border-gray-800">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-800 text-gray-400 text-xs uppercase font-mono border-b border-gray-800">
                <th class="p-4">ID</th>
                <th class="p-4">Cor/Ícone</th>
                <th class="p-4">Nome</th>
                <th class="p-4">Descrição</th>
                <th class="p-4">Status</th>
                <th class="p-4 text-center">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800 text-sm">
            @foreach($genders as $gender)
            <tr class="hover:bg-gray-800/30">
                <td class="p-4 text-gray-500">{{ $gender->id }}</td>
                <td class="p-4">
                    <div class="flex items-center space-x-2">
                        <span class="w-4 h-4 rounded-full inline-block" style="background-color: {{ $gender->cor ?? '#7c3aed' }}"></span>
                        <span class="text-gray-400 font-mono text-xs">{{ $gender->icone ?? 'N/A' }}</span>
                    </div>
                </td>
                <td class="p-4 font-medium text-purple-400">{{ $gender->nome }}</td>
                <td class="p-4 text-gray-400 max-w-xs truncate">{{ $gender->descricao }}</td>
                <td class="p-4">
                    @if($gender->ativo)
                        <span class="bg-green-900/50 text-green-400 border border-green-700 text-xs px-2 py-0.5 rounded-full">Ativo</span>
                    @else
                        <span class="bg-red-900/50 text-red-400 border border-red-700 text-xs px-2 py-0.5 rounded-full">Inativo</span>
                    @endif
                </td>
                <td class="p-4 flex justify-center space-x-3">
                    <a href="{{ route('genders.edit', $gender->id) }}" class="text-blue-400 hover:text-blue-300 font-medium">Editar</a>

                    <form action="{{ route('genders.destroy', $gender->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este gênero?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($genders->isEmpty())
            <tr>
                <td colspan="6" class="p-8 text-center text-gray-500">Nenhum gênero cadastrado até o momento.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection