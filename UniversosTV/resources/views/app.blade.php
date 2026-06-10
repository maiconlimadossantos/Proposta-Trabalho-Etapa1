<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white flex h-screen overflow-hidden">

    <div id="sidebar" class="w-64 bg-gray-900 h-full border-r border-gray-800 transition-all duration-300 transform translate-x-0">
        <div class="p-5 flex justify-between items-center border-b border-gray-800">
            <span class="font-bold text-xl text-purple-500 tracking-wider">STREAM FLIX</span>
        </div>
        <nav class="p-4 space-y-1">
            <a href="{{ route('dashboard') }}" class="block p-3 rounded hover:bg-gray-800 transition">Início / Catálogo</a>
            <a href="{{ route('users.index') }}" class="block p-3 rounded hover:bg-gray-800 transition">Gerenciar Usuários</a>
        </nav>
    </div>

    <div class="flex-1 flex flex-col h-full overflow-hidden">

        <header class="bg-gray-900 h-16 px-6 flex justify-between items-center border-b border-gray-800">
            <button onclick="toggleSidebar()" class="bg-gray-800 hover:bg-gray-700 p-2 rounded text-gray-300 transition">
                ☰ <span class="hidden md:inline ml-1">Menu</span>
            </button>

            <div class="flex items-center space-x-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-400">Administrador</p>
                </div>
                <img class="h-9 w-9 rounded-full object-cover border border-purple-500"
                     src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100" alt="Foto de Perfil">

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-xs text-red-400 hover:text-red-300 underline pl-2">Sair</button>
                </form>
            </div>
        </header>

        <main class="flex-1 p-6 overflow-y-auto bg-gray-950">
            @if(session('success'))
                <div class="bg-green-900/40 border border-green-500 text-green-200 p-3 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-900/40 border border-red-500 text-red-200 p-3 rounded mb-4 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('translate-x-0')) {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
                sidebar.style.width = '0px';
            } else {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                sidebar.style.width = '16rem'; // w-64 equivalent
            }
        }
    </script>
</body>
</html>