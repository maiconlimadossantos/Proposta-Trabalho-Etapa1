@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-gray-900 p-6 rounded-lg border border-gray-800">
    <h1 class="text-xl font-bold mb-5 text-purple-400">Modificar Registro do Histórico</h1>

    <form action="{{ route('profile-titles.update', $profileTitle->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Perfil do Usuário</label>
            <select name="perfil_id" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
                @foreach($profiles as $profile)
                    <option value="{{ $profile->id }}" {{ $profileTitle->perfil_id == $profile->id ? 'selected' : '' }}>{{ $profile->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Tipo de Mídia</label>
                <select id="tipo_conteudo" name="tipo_conteudo" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500" onchange="atualizarOpcoesMidia()">
                    <option value="filme" {{ $profileTitle->tipo_conteudo == 'filme' ? 'selected' : '' }}>Filme</option>
                    <option value="anime" {{ $profileTitle->tipo_conteudo == 'anime' ? 'selected' : '' }}>Anime</option>
                    <option value="novela" {{ $profileTitle->tipo_conteudo == 'novela' ? 'selected' : '' }}>Novela</option>
                    <option value="serie" {{ $profileTitle->tipo_conteudo == 'serie' ? 'selected' : '' }}>Série</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Obra Selecionada</label>
                <select id="conteudo_id" name="conteudo_id" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
                    </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Nota de Avaliação</label>
            <select name="avaliacao" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
                <option value="">Não avaliar</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $profileTitle->avaliacao == $i ? 'selected' : '' }}>{{ $i }} Estrelas</option>
                @endfor
            </select>
        </div>

        <div class="flex items-center pt-2">
            <input type="checkbox" name="assistido" id="assistido" value="1" {{ $profileTitle->assistido ? 'checked' : '' }}
                   class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded focus:ring-purple-500 focus:ring-2">
            <label for="assistido" class="ml-2 text-sm font-medium text-gray-300">Marcar este conteúdo como totalmente assistido</label>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-800">
            <a href="{{ route('profile-titles.index') }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded text-sm transition">Cancelar</a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded text-sm font-medium transition">Atualizar Dados</button>
        </div>
    </form>
</div>

<script>
    const catalogos = {
        filme: [@foreach($filmes as $f) { id: {{ $f->id }}, nome: "{{ $f->nome }}" }, @endforeach],
        anime: [@foreach($animes as $a) { id: {{ $a->id }}, nome: "{{ $a->nome }}" }, @endforeach],
        novela: [@foreach($novelas as $n) { id: {{ $n->id }}, nome: "{{ $n->nome }}" }, @endforeach],
        serie: [@foreach($series as $s) { id: {{ $s->id }}, nome: "{{ $s->nome }}" }, @endforeach],
    };

    function atualizarOpcoesMidia(selectedId = null) {
        const tipo = document.getElementById('tipo_conteudo').value;
        const seletorConteudo = document.getElementById('conteudo_id');
        seletorConteudo.innerHTML = '<option value="">Selecione uma opção...</option>';

        if (catalogos[tipo]) {
            catalogos[tipo].forEach(item => {
                const selected = item.id == selectedId ? 'selected' : '';
                seletorConteudo.innerHTML += `<option value="${item.id}" ${selected}>${item.nome}</option>`;
            });
        }
    }

    // Inicializa carregando a obra correta que já estava salva
    document.addEventListener("DOMContentLoaded", function() {
        atualizarOpcoesMidia({{ $profileTitle->conteudo_id ?? 'null' }});
    });
</script>
@endsection