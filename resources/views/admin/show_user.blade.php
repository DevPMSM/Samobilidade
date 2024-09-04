<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}"> -->

    <link rel="stylesheet" href="{{ asset ('assets/css/usuario.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title', 'Samobilidade')</title>
</head>
<body>
    <h1>Painel Admin</h1>
    <h2>Detalhes do Usuario</h2>

    <div>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Cargo:</strong> {{ ucfirst($user->role) }}</p>
        <p><strong>Criado em:</strong> {{ $user->created_at->format('d/m/Y H:i:s') }}</p>
        <p><strong>Last Updated:</strong> {{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
    </div>

    <div>
        <a href="{{ route('users.edit', $user->id) }}">Editar Usuario</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete User</button>
        </form>
        <a href="{{ route('users.index') }}">Voltar a lista de Usuarios</a>
    </div>
</body>
</html>