<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/usuario.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Editar</title>
    <!-- Quill Editor CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <main class="users" id="dashboardId">
            @include('components/sidebar-admin')
            <div class="user_create">
                <div class="form_container">
                    <h1>Editar</h1>
                    <hr class="linha">
                    <form class="form" action="{{route('users.update', $users->id) }}" method="post" id="userForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <input type="text" id="name" name="name" placeholder="Nome"  maxlength="100" value="{{$users->name}}" ><br>
                            <input type="email" id="email" name="email" placeholder="Email"   maxlength="100" value="{{$users->email}}" ><br>
                            <input type="password" id="password" name="password" placeholder="Senha"   maxlength="100" value="{{$users->password}}" ><br>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua Senha" value="{{$users->password}}">
                    </form>

                    <div class="nav">
                        <a href="/admin/users">
                            <img src="{{asset('assets/img/voltar.svg')}}" alt="Voltar" id="voltar">
                        </a>

                        <button type="submit" form="userForm" style="background: none; border: none; padding: 0;">
                            <img src="{{asset('assets/img/send.svg')}}" alt="Enviar" id="save">
                        </button>
                    </div>
                </div>
            </div>
        </main>
        @include('components/footer')
    </div>
</body>
</html>
