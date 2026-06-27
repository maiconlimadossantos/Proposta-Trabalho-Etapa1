<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Streaming</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white flex items-center justify-center h-screen">

    <div class="bg-gray-900 p-8 rounded-lg shadow-xl border border-gray-800 w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-purple-500 mb-6">Acessar Sistema da UniversoTV</h2>

        @if ($errors->any())
            <div class="bg-red-900/50 border border-red-500 text-red-200 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">E-mail</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                    class="w-full bg-gray-950 border border-gray-700 rounded p-2.5 text-white focus:outline-none focus:border-purple-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Senha</label>
                <input type="password" name="password" required
                    class="w-full bg-gray-950 border border-gray-700 rounded p-2.5 text-white focus:outline-none focus:border-purple-500">
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium p-2.5 rounded transition duration-200">
                Entrar
            </button>

            <a href="{{url ('/CadastrarUsuario')}}">Cadastrar usuario</a>
        </form>
    </div>

</body>
</html>