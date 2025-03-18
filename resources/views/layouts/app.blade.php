<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('images/solus.png') }}" type="image/x-icon">
  <title>Solus</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue">
  <header class="h-16 flex items-center justify-between p-0 px-5 fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-[#008070] to-[#800042]">
    <div class="logo-container" onclick="toggleMenu()">
        <img id="logo" class="rotate transition-transform duration-500 ease-in-out" src="{{ asset('images/solus.png') }}" alt="Ícone" width="42" height="42">
    </div>
  </header>

  <div class="mt-16">
    @yield('content') 
  </div>
</body>
</html>
