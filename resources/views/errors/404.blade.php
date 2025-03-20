<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada - 404</title>
    <link rel="icon" href="{{ asset('Images/Icons/Solus.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-red-800 to-blue-800 h-screen flex justify-center items-center">
    <div class="text-center p-6 bg-white bg-opacity-90 rounded-lg shadow-lg max-w-lg">
        <h1 class="text-5xl font-bold text-gray-700 mb-4">404</h1>
        <p class="text-2xl text-gray-600 mb-4">A página que você procurou não foi encontrada.</p>
        <a href="{{ url('/home') }}" class="text-blue-500 hover:text-blue-600 text-lg">
            Voltar para a página inicial
        </a>
    </div>
</body>
</html>
