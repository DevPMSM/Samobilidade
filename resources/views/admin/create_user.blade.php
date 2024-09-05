<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">

    <link rel="stylesheet" href="{{ asset ('assets/css/usuario.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title', 'Samobilidade')</title>
</head>

<body>
    <h1>Painel Admin</h1>
    <h2>Criar novo Usuário</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="editor">Editor</option>
            </select>
        </div>
        <div>
            <button type="submit">CRIAR USUARIO</button>
        </div>
    </form>
</body>
</html>