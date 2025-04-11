<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solus</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="{{ asset('Css/Header/Header.css') }}" rel="stylesheet">
  <script src="{{ asset('Js/Header/Header.js') }}" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue">
  <header class="h-16 flex items-center justify-between p-0 px-5 fixed top-0 left-0 w-full z-50 bg-gray-700">
    <div class="logo-container" onclick="toggleMenu()">
        <img id="logo" class="rotate transition-transform duration-500 ease-in-out" src="{{ asset('Images/Icons/Solus.png') }}" alt="Ícone" width="42" height="42">
    </div>
    <div class="relative">
      <button class="flex items-center text-white focus:outline-none" onclick="toggleDropdown()">
        <div class="flex items-center gap-2">
            <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->cncomusua) }}" alt="Avatar" class="w-10 h-10 rounded-full">
              @if(Auth::check())
                <span>{{ Auth::user()->cnomeusua }}</span>
              @else
                <span>Usuário não autenticado</span>
              @endif
          </div>
      </button>
      <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden">
        <ul>
          <li>
            <button id="openProfileModal" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Perfil</button>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
              @csrf
              <button type="submit" class="w-full text-left">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <div id="profileModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden z-50">
    <div class="relative bg-white p-8 rounded-xl shadow-lg w-[90%] max-w-md">
      <button id="closeProfileModal" class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-2xl font-bold focus:outline-none">
        X
      </button>
      <h2 class="text-2xl font-semibold mb-6 text-center">Meu perfil</h2>

      @if(Auth::check())
        <div class="flex flex-col items-center mb-6">
          <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->cncomusua) }}" alt="Avatar" class="w-16 h-16 rounded-full mb-2">
        </div>

        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nome completo:</label>
            <input type="text" value="{{ Auth::user()->cncomusua }}" readonly class="w-full bg-gray-100 text-gray-700 p-2 rounded-md">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Usuário:</label>
            <input type="text" value="{{ Auth::user()->cnomeusua }}" readonly class="w-full bg-gray-100 text-gray-700 p-2 rounded-md">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
            <!--Alguns usuarios do banco não tem o email na coluna então fica vazio-->
            <input type="text" value="{{ Auth::user()->cmailusua }}" readonly class="w-full bg-gray-100 text-gray-700 p-2 rounded-md">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Data de nascimento:</label>
            <input type="text" value="{{ \Carbon\Carbon::parse(Auth::user()->dnascusua)->format('d/m/Y') }}" readonly class="w-full bg-gray-100 text-gray-700 p-2 rounded-md">
          </div>
        </div>
      @else
        <p class="text-lg text-center">Usuário não autenticado.</p>
      @endif
    </div>
  </div>

  <div class="mt-16">
    @yield('content')
  </div>
  <x-footer />
</body>
</html>
