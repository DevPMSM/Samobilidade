<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">

    <link rel="stylesheet" href="{{ asset ('assets/css/usuario.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title', 'Samobilidade')</title>
</head>

<div class="container">
    <div class="cardAdd">
        <h1> Editar  </h1>
        <hr>
        <div class="divForm">
            <form class="form" action="{{route('users.update', $users->id) }}" method="post" id="usuarioForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <input type="text" id="name" name="name" value="{{$users->name}}"><br>
                <input type="text" id="role" name="role" value="{{$users->role}}"><br>
                <input type="email" id="email" name="email" value="{{$users->email}}"><br>
                <input type="password" id="password" name="password" value="{{$users->password}}"><br>
            </form>
        </div>

        <div class="nav">
            <a href="javascript:history.back()" class="voltar" >
                <img src="{{asset('assets\img\voltar.svg')}}" alt="Voltar" id="voltar">
                <span>Voltar</span>
            </a>

            <button class="editar" type="submit" form="usuarioForm" style="background: none; border: none; padding: 0;">
                <span>Editar</span>
                <img src="{{asset('assets\img\edit.svg')}}" alt="Editar" id="editar">
            </button>
        </div>

    </div>
</div>

@component('components.footer') @endcomponent

<script>
    document.getElementById('imagem').addEventListener('change', function() {
        const fileInput = this;
        const fileNameSpan = document.getElementById('file-name');

        if (fileInput.files.length > 0) {
            fileNameSpan.textContent = fileInput.files[0].name;
        } else {
            fileNameSpan.textContent = 'Adicionar Imagem';
        }
    });
</script>
