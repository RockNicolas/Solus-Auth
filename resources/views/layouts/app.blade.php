<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('Images/Icons/Solus.png') }}" type="image/x-icon">
  <title>Solus</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="{{ asset('Js/Header/Header.js') }}" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue">
  <header class="h-16 flex items-center justify-between p-0 px-5 fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-[#008070] to-[#800042]">
    <div class="logo-container" onclick="toggleMenu()">
        <img id="logo" class="rotate transition-transform duration-500 ease-in-out" src="{{ asset('Images/Icons/Solus.png') }}" alt="Ícone" width="42" height="42">
    </div>

    <div class="relative">
      <button class="flex items-center text-white focus:outline-none" onclick="toggleDropdown()">
        <i class="fas fa-user-circle text-2xl mr-2"></i>
        <!-- CRIADO PARA VER A VERIFICAÇÃO DE AUTH(TESTE) -->
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
  <!--CRIAÇÃO DE MODAL PARA O USER PODER VER SEUS DADOS-->
  <div id="profileModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-md shadow-lg w-1/3">
      <h2 class="text-2xl mb-4">Perfil</h2>
      
      @if(Auth::check())
        <p><strong>Nome Completo:</strong> {{ Auth::user()->cncomusua }}</p>
        <p><strong>Usuário:</strong> {{ Auth::user()->cnomeusua }}</p>
        <p><strong>Data de Nascimento:</strong> {{ Auth::user()->dvensusua }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->cmailusua }}</p>
      @else
        <p>Usuário não autenticado.</p>
      @endif
      
      <button id="closeProfileModal" class="mt-4 w-full bg-red-500 text-white p-2 rounded-md">Fechar</button>
    </div>

  </div>
  <div class="mt-16">
    @yield('content') 
  </div>
</body>
</html>
