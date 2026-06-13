@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-gray-900 p-6 rounded-lg border border-gray-800">
    <h1 class="text-xl font-bold mb-5 text-purple-400">Vincular Conteúdo ao Histórico</h1>

    <form action="{{ route('profile-titles.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Selecione o Perfil</label>
            <select name="perfil_id" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
                <option value="">Escolha um perfil...</option>
                @foreach($profiles as $profile)
                    <option value="{{ $profile->id }}">{{ $profile->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Tipo de Mídia</label>
                <select id="tipo_conteudo" name="tipo_conteudo" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500" onchange="atualizarOpcoesMidia()">
                    <option value="">Selecione o tipo...</option>
                    <option value="filme">Filme</option>
                    <option value="anime">Anime</option>
                    <option value="novela">Novela</option>
                    <option value="serie">Série</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Escolha a Obra</label>
                <select id="conteudo_id" name="conteudo_id" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
                    <option value="">Selecione a mídia primeiro...</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Nota de Avaliação (1 a 5 Estrelas)</label>
            <select name="avaliacao" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
                <option value="">Não avaliar agora</option>
                <option value="1">1 Estrela</option>
                <option value="2">2 Estrelas</option>
                <option value="3">3 Estrelas</option>
                <option value="4">4 Estrelas</option>
                <option value="5">5 Estrelas</option>
            </select>
        </div>

        <div class="flex items-center pt-2">
            <input type="checkbox" name="assistido" id="assistido" value="1" checked
                   class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded focus:ring-purple-500 focus:ring-2">
            <label for="assistido" class="ml-2 text-sm font-medium text-gray-300">Marcar este conteúdo como totalmente assistido</label>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-800">
            <a href="{{ route('profile-titles.index') }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded text-sm transition">Cancelar</a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded text-sm font-medium transition">Salvar Registro</button>
        </div>
    </form>
</div>

<script>
    // Gerenciador Javascript para alterar o conteúdo dinamicamente conforme o tipo selecionado
    const catalogos = {
        filme: [@foreach($filmes as $f) { id: {{ $f->id }}, nome: "{{ $f->nome }}" }, @endforeach],
        anime: [@foreach($animes as $a) { id: {{ $a->id }}, nome: "{{ $a->nome }}" }, @endforeach],
        novela: [@foreach($novelas as $n) { id: {{ $n->id }}, nome: "{{ $n->nome }}" }, @endforeach],
        serie: [@foreach($series as $s) { id: {{ $s->id }}, nome: "{{ $s->nome }}" }, @endforeach],
    };

    function atualizarOpcoesMidia() {
        const tipo = document.getElementById('tipo_conteudo').value;
        const seletorConteudo = document.getElementById('conteudo_id');
        seletorConteudo.innerHTML = '<option value="">Selecione uma opção...</option>';

        if (catalogos[tipo]) {
            catalogos[tipo].forEach(item => {
                seletorConteudo.innerHTML += `<option value="${item.id}">${item.nome}</option>`;
            });
        }
    }
</script>
@endsection