@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-gray-900 p-6 rounded-lg border border-gray-800">
    <h1 class="text-xl font-bold mb-5 text-purple-400">Editar Usuário: {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Nome Completo</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                   class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Endereço de E-mail</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                   class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Senha de Acesso (Deixe em branco para não alterar)</label>
            <input type="password" name="password" class="w-full bg-gray-950 border border-gray-700 rounded p-2 text-white focus:outline-none focus:border-purple-500">
        </div>

        <div class="flex justify-end space-x-3 pt-2">
            <a href="{{ route('users.index') }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded text-sm transition">Cancelar</a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded text-sm font-medium transition">Atualizar Dados</button>
        </div>
    </form>
</div>
@endsection