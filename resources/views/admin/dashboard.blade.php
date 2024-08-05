<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAINEL ADMIN</title>
</head>
<body>
    <h1>Painel Admin</h1>
    <p>Users</p>
    @foreach ($users as $user)
        <h2>{{ $user->name }}</h2>
    @endforeach
</body>
</html>