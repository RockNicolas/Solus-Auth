<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solus</title>
    <link rel="icon" href="{{ asset('images/solus.png') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('Css/login.css') }}" rel="stylesheet">
    <script src="{{ asset('js/login.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black flex justify-center items-center h-screen m-0 relative">
    <div class="absolute top-0 left-0 w-full h-full bg-cover bg-center z-[-1]" style="background-image: url('');"></div>
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-96 text-center">
        <h2 class="text-2xl font-semibold mb-6 text-gray-700">Login</h2>
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-left text-gray-600 mb-2">Usuário:</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6 relative">
                <label for="senha" class="block text-left text-gray-600 mb-2">Senha:</label>
                <input type="password" name="senha" id="senha" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i id="togglePassword" class="fas fa-eye absolute right-3 top-10 text-black cursor-pointer text-2xl"></i>
            </div>

            <button type="submit"
                class="w-full py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Login
            </button>

            @if ($errors->any())
                <ul id="error-message" class="mt-4 text-red-500 text-sm absolute top-0 right-0 p-4 rounded-lg border-2 border-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>

        <div id="capsLockWarning" class="text-red-500 text-sm mt-2 hidden absolute top-0 right-0 p-4">
            <p>Caps Lock está ativado.</p>
        </div> 
    </div>
</body>
</html>
