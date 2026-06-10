@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-900 p-6 rounded-lg border border-gray-800">
    <h1 class="text-xl font-bold mb-5 text-purple-400">Editar Filme: {{ $movie->titulo }}</h1>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Título do Filme</label>
                <input type="text" name="titulo" value="{{ old('titulo', $movie->titulo) }}" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Diretor</label>
                <input type="text" name="diretor" value="{{ old('diretor', $movie->diretor) }}" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Sinopse / Descrição</label>
            <textarea name="descricao" rows="3" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">{{ old('descricao', $movie->descricao) }}</textarea>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Ano de Lançamento</label>
                <input type="number" name="ano_lancamento" value="{{ old('ano_lancamento', $movie->ano_lancamento) }}" required min="1800" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Duração</label>
                <input type="text" name="duracao" value="{{ old('duracao', $movie->duracao) }}" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Gênero</label>
                <select name="genero_id" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
                    @foreach($genders as $gender)
                        <option value="{{ $gender->id }}" {{ $movie->genero_id == $gender->id ? 'selected' : '' }}>{{ $gender->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">URL da Imagem da Capa</label>
            <input type="url" name="capa" value="{{ old('capa', $movie->capa) }}" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
        </div>

        <div class="flex space-x-6 pt-2">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="dublado" value="1" {{ $movie->dublado ? 'checked' : '' }} class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded">
                <span class="ml-2 text-sm text-gray-300">Dublado</span>
            </label>
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="legendado" value="1" {{ $movie->legendado ? 'checked' : '' }} class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded">
                <span class="ml-2 text-sm text-gray-300">Legendado</span>
            </label>
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="disponivel" value="1" {{ $movie->disponivel ? 'checked' : '' }} class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded">
                <span class="ml-2 text-sm text-gray-300">Disponível no Catálogo</span>
            </label>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-800">
            <a href="{{ route('movies.index') }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded text-sm transition">Cancelar</a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded text-sm font-medium transition">Atualizar Filme</button>
        </div>
    </form>
</div>
@endsection