@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-900 p-6 rounded-lg border border-gray-800">
    <h1 class="text-xl font-bold mb-5 text-purple-400">Cadastrar Novo Anime</h1>

    <form action="{{ route('animes.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Título do Anime</label>
                <input type="text" name="titulo" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Estúdio de Animação</label>
                <input type="text" name="estudio" required placeholder="Ex: Mappa, Wit Studio" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Sinopse / Descrição</label>
            <textarea name="descricao" rows="3" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500"></textarea>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Ano Lançamento</label>
                <input type="number" name="ano_lancamento" required min="1900" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Nº Episódios</label>
                <input type="number" name="episodios" required min="1" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Duração Média</label>
                <input type="text" name="duracao" required placeholder="00:24:00" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Gênero Principal</label>
                <select name="genero_id" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
                    <option value="">Selecione...</option>
                    @foreach($genders as $gender)
                        <option value="{{ $gender->id }}">{{ $gender->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">URL da Imagem da Capa (Opcional)</label>
            <input type="url" name="capa" placeholder="https://link-da-imagem.com/capa.jpg" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
        </div>

        <div class="flex space-x-6 pt-2">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="dublado" value="1" class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded">
                <span class="ml-2 text-sm text-gray-300">Dublado</span>
            </label>
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="legendado" value="1" class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded">
                <span class="ml-2 text-sm text-gray-300">Legendado</span>
            </label>
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="disponivel" value="1" checked class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded">
                <span class="ml-2 text-sm text-gray-300">Publicado / Disponível</span>
            </label>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-800">
            <a href="{{ route('animes.index') }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded text-sm transition">Cancelar</a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded text-sm font-medium transition">Salvar Anime</button>
        </div>
    </form>
</div>
@endsection