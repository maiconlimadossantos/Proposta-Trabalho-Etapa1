<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Universos TV - Cadastro de Gênero</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen flex items-center justify-center p-6">

    <div class="bg-gray-900 p-8 rounded-xl shadow-2xl border border-gray-800 w-full max-w-lg">

        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-blue-500 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                Universos TV — Painel Administrativo
            </h1>
            <p class="text-gray-400 text-sm mt-1">Cadastro de Novo Gênero/Categoria</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-900/50 border border-red-500 text-red-200 text-sm p-4 rounded-lg mb-6">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.titulo.store') }}" method="POST" class="space-y-5">
            @csrf

            <input type="hidden" name="tipo_cadastro" value="genero">

            <div>
                <label for="nome" class="block text-sm font-medium text-gray-300 mb-1">Nome do Gênero:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-2.5 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"
                    placeholder="Ex: Animação, Ficção Científica, Ação" required>
            </div>

            <div>
                <label for="descricao" class="block text-sm font-medium text-gray-300 mb-1">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="3"
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-2.5 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition resize-none"
                    placeholder="Breve resumo sobre o tipo de conteúdo deste gênero..." required>{{ old('descricao') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="icone" class="block text-sm font-medium text-gray-300 mb-1">Ícone (Classe ou Nome):</label>
                    <input type="text" id="icone" name="icone" value="{{ old('icone') }}"
                        class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-2.5 text-white placeholder-gray-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"
                        placeholder="Ex: bi bi-film, fa-ghost">
                </div>

                <div>
                    <label for="cor" class="block text-sm font-medium text-gray-300 mb-1">Cor de Destaque:</label>
                    <div class="flex space-x-2">
                        <input type="color" id="cor" name="cor" value="{{ old('cor', '#3b82f6') }}"
                            class="bg-gray-950 border border-gray-800 h-11 w-14 p-1 rounded-lg cursor-pointer">
                        <span class="text-xs text-gray-400 self-center">Cor da tag na Home</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center space-x-3 pt-2">
                <input type="checkbox" id="ativo" name="ativo" value="1" {{ old('ativo', true) ? 'checked' : '' }}
                    class="w-4 h-4 rounded text-blue-600 bg-gray-950 border-gray-800 focus:ring-blue-500 focus:ring-offset-gray-900 focus:ring-2">
                <label for="ativo" class="text-sm font-medium text-gray-300 select-none">Disponibilizar gênero imediatamente no menu de navegação</label>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:shadow-xl transition transform active:scale-[0.98]">
                    Salvar Categoria
                </button>
            </div>
        </form>

    </div>

</body>
</html>