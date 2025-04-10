<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solus</title>
    <link rel="icon" href="{{ asset('Images/Icons/Solus.png') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('Css/Login/Login.css') }}" rel="stylesheet">
    <script src="{{ asset('Js/Login/Login.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gradient-to-r from-[#B9024A] to-[#00538E]">
    <div class="flex w-4/5 h-4/5 bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="w-1/2 flex flex-col justify-center items-center px-12 bg-white rounded-l-2xl">
            <img src="{{ asset('Images/Icons/Solus.png') }}" class="w-12 mb-4" alt="Logo">
            <h2 class="text-2xl font-bold text-gray-700 mb-2">Boas vindas!</h2>
            <p class="text-gray-500 mb-6">Insira suas credenciais para obter o acesso.</p>

            <form action="{{ url('login') }}" method="POST" class="w-full relative">
                @csrf

                <div class="mb-4 flex justify-center">
                    <div class="w-80">
                        <label for="username" class="block text-gray-600 text-sm">Usuário</label>
                        <input type="text" name="username" id="username" required
                            class="w-full h-10 p-4 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                            @if ($errors->has('username')) border-red-500 @endif">
                    </div>
                </div>

                <div class="mb-4 flex justify-center">
                    <div class="w-80 relative">
                        <label for="senha" class="block text-gray-600 text-sm">Senha</label>
                        <input type="password" name="password" id="password" required
                            class="w-full h-10 p-4 pr-12 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                            @if ($errors->has('username')) border-red-500 @endif">
                        <i id="togglePassword" class="fas fa-eye absolute right-3 top-8 text-gray-500 cursor-pointer"></i>
                        <p id="capsWarning" class="text-red-500 text-sm mt-1 hidden">Caps Lock está ativado!</p>
                    </div>
                </div>

                 @if ($errors->has('username'))
                    <p class="text-red-500 text-sm mt-[-15px] ml-[66px] ">
                        {{ $errors->first('username') }}
                    </p>
                @endif

                <div class="flex justify-center">
                    <div class="w-80">
                        <button type="submit"
                            class="w-full py-3 bg-[#00538E] text-white font-semibold rounded-md hover:bg-blue-700 transition">
                            Entrar
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="w-1/2 bg-[#00538E] text-white flex flex-col justify-center items-center text-center px-10 rounded-r-2xl relative">
            <p class="text-2xl ml-[-90px]">Acesse agora a</p>
            <h1 class="text-6xl font-bold tracking-[10px] ml-[-10px]">SOLUS</h1>
            <p class="text-xl mt-2 ml-[70px]">A saúde do seu plano</p>

            <div class="absolute top-[-20px] left-6 flex items-center justify-center">
                <div class="w-12 h-36 border-2 border-white rounded-full"></div>
                <div class="w-36 h-12 border-2 border-white rounded-full absolute"></div>
            </div>

            <div class="absolute bottom-[-20px] right-6 flex items-center justify-center">
                <div class="w-12 h-36 border-2 border-white rounded-full"></div>
                <div class="w-36 h-12 border-2 border-white rounded-full absolute"></div>
            </div>
        </div>
    </div>
</body>
</html>
