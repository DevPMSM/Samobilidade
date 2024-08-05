<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAINEL ADMIN</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <div>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
            </select>
        </div>
        <div>
            <button type="submit">EDITAR USUARIO</button>
        </div>
    </form>
</body>
</html>