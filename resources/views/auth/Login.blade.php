<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solus</title>
    <link rel="icon" href="{{ asset('images/solus.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen m-0 relative"></bodyclass>
    <div class="absolute top-0 left-0 w-full h-full bg-cover bg-center z-[-1]" 
        style="background-image: url('');">
    </div>
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-96 text-center">
        <h2 class="text-2xl font-semibold mb-6 text-gray-700">Login</h2>
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="Test" class="block text-left text-gray-600 mb-2">Usuário:</label>
                <input type="text" name="Test" id="Test" value="{{ old('Test') }}" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label for="senha" class="block text-left text-gray-600 mb-2">Senha:</label>
                <input type="password" name="senha" id="senha" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Login
            </button>

            @if ($errors->any())
                <ul class="mt-4 text-red-500 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>
</body>
</html>