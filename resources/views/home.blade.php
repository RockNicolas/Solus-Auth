@extends('layouts.app')

@section('content')
<!--So para testar -->
<title>Formulário de Nome</title>
    <script>
        function salvarNome() {
            const nome = document.getElementById('nome').value;
            if (nome) {
                localStorage.setItem('nome', nome);
                document.getElementById('mensagem').textContent = 'Nome salvo com sucesso!';
                document.getElementById('nome').value = ''; 
            } else {
                document.getElementById('mensagem').textContent = 'Por favor, insira um nome.';
            }
        }

        window.onload = function() {
            const nomeSalvo = localStorage.getItem('nome');
            if (nomeSalvo) {
                document.getElementById('nomeSalvo').textContent = `Olá, ${nomeSalvo}!`;
            }
        };
    </script>
</head>
<body>

    <h1>Digite seu nome</h1>

    <div id="nomeSalvo"></div>

    <form action="javascript:void(0);" onsubmit="salvarNome()">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <button type="submit">Salvar</button>
    </form>

    <p id="mensagem"></p>

</body>
</script>
@endsection
