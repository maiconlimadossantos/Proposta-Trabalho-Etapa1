@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-gray-900 p-6 rounded-lg border border-gray-800">
    <h1 class="text-xl font-bold mb-5 text-purple-400">Criar Perfil de Visualização</h1>

    <form action="{{ route('profiles.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Vincular à Conta do Usuário (Dono)</label>
            <select name="user_id" required class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
                <option value="">Selecione o titular da conta...</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Nome do Perfil</label>
            <input type="text" name="nome" required placeholder="Ex: Filho, Sala, Meu Perfil"
                   class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">URL da Imagem do Avatar (Opcional)</label>
            <input type="url" name="avatar" placeholder="https://link-da-imagem.com/avatar.jpg"
                   class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
        </div>

        <div class="flex items-center pt-2">
            <input type="checkbox" name="is_infatil" id="is_infatil" value="1"
                   class="w-4 h-4 text-purple-600 bg-gray-950 border-gray-700 rounded focus:ring-purple-500 focus:ring-2">
            <label for="is_infatil" class="ml-2 text-sm font-medium text-gray-300">Este é um perfil para uso infantil (Restrição de Conteúdo)</label>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-800">
            <a href="{{ route('profiles.index') }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded text-sm transition">Cancelar</a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded text-sm font-medium transition">Salvar Perfil</button>
        </div>
    </form>
</div>
@endsection