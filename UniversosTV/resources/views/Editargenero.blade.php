@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-gray-900 p-6 rounded-lg border border-gray-800">
    <h1 class="text-xl font-bold mb-5 text-purple-400">Editar Gênero: {{ $gender->nome }}</h1>

    <form action="{{ route('genders.update', $gender->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Nome do Gênero</label>
            <input type="text" name="nome" value="{{ old('nome', $gender->nome) }}" required
                   class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Descrição</label>
            <input type="text" name="descricao" value="{{ old('descricao', $gender->descricao) }}" required
                   class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Classe do Ícone (Opcional)</label>
                <input type="text" name="icone" value="{{ old('icone', $gender->icone) }}"
                       class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Cor Identificadora</label>
                <div class="flex space-x-2">
                    <input type="color" name="cor" value="{{ old('cor', $gender->cor ?? '#7c3aed') }}"
                           class="w-12 h-10 bg-gray-950 border border-gray-700 rounded p-1 cursor-pointer">
                    <span class="text-xs text-gray-500 self-center">Escolha a cor de destaque</span>
                </div>
            </div>
        </div>

        <div class="flex items-center pt-2">
            <input type="checkbox" name="ativo" id="ativo" value="1" {{ $gender->ativo ? 'checked' : '' }}
                   class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded focus:ring-purple-500 focus:ring-2">
            <label for="ativo" class="ml-2 text-sm font-medium text-gray-300">Gênero Ativo no Sistema</label>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-800">
            <a href="{{ route('genders.index') }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded text-sm transition">Cancelar</a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded text-sm font-medium transition">Atualizar Dados</button>
        </div>
    </form>
</div>
@endsection