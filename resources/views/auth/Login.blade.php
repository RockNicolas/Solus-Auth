<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <div>
            <label for="Test">User:</label>
            <input type="Test" name="Test" id="Test" value="{{ old('Test') }}" required>> 
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>> 
        </div>

        <button type="submit">Login</button>


        @if ($errors->any())
            <ul>
                @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</body>
</html>