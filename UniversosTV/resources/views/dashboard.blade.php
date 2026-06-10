@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="bg-gray-900 p-6 rounded-lg border border-gray-800">
        <h1 class="text-2xl font-bold text-purple-400">Visão Geral do Catálogo</h1>
        <p class="text-gray-400 text-sm mt-1">Abaixo você pode ver o conteúdo atualmente hospedado no sistema.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-gray-900 rounded-lg overflow-hidden border border-gray-800 group hover:border-purple-500 transition">
            <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?w=500" class="w-full h-44 object-cover">
            <div class="p-4"><h3 class="font-bold">Animes em Destaque</h3><p class="text-xs text-gray-400 mt-1">24 Títulos Ativos</p></div>
        </div>

        <div class="bg-gray-900 rounded-lg overflow-hidden border border-gray-800 group hover:border-purple-500 transition">
            <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=500" class="w-full h-44 object-cover">
            <div class="p-4"><h3 class="font-bold">Filmes Recentes</h3><p class="text-xs text-gray-400 mt-1 font-mono">142 Filmes em HD</p></div>
        </div>

        <div class="bg-gray-900 rounded-lg overflow-hidden border border-gray-800 group hover:border-purple-500 transition">
            <img src="https://images.unsplash.com/photo-1593305841991-05c297ba4575?w=500" class="w-full h-44 object-cover">
            <div class="p-4"><h3 class="font-bold">Séries de TV</h3><p class="text-xs text-gray-400 mt-1">12 Temporadas Novas</p></div>
        </div>

        <div class="bg-gray-900 rounded-lg overflow-hidden border border-gray-800 group hover:border-purple-500 transition">
            <img src="https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?w=500" class="w-full h-44 object-cover">
            <div class="p-4"><h3 class="font-bold">Novelas Antigas</h3><p class="text-xs text-gray-400 mt-1">8 Produções Disponíveis</p></div>
        </div>
    </div>
</div>
@endsection