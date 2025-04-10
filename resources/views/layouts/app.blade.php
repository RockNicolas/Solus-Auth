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
        <i class="fas fa-user-circle text-2xl mr-2"></i>
        @if(Auth::check())
          <span>{{ Auth::user()->cnomeusua }}</span>
        @else
          <span>Usuário não autenticado</span>
        @endif
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

  <div id="profileModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-10 rounded-md shadow-lg w-2/3 md:w-1/2 lg:w-1/3">
      <h2 class="text-3xl font-semibold mb-6 text-center">Perfil</h2>
      
      @if(Auth::check())
        <p class="text-lg"><strong>Nome Completo:</strong> {{ Auth::user()->cncomusua }}</p>
        <p class="text-lg"><strong>Usuário:</strong> {{ Auth::user()->cnomeusua }}</p>
        <p class="text-lg"><strong>Email:</strong> {{ Auth::user()->cmailusa }}</p>
      @else
        <p class="text-lg">Usuário não autenticado.</p>
      @endif
      
      <button id="closeProfileModal" class="mt-6 w-full bg-red-500 text-white p-3 rounded-md text-lg">Fechar</button>
    </div>
  </div>

  <div class="mt-16">
    @yield('content')
  </div>
  
  <x-footer />
</body>
</html>
