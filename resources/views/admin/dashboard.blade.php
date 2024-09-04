<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/indexUser.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title', 'Samobilidade')</title>
</head>

<body>
    <div class="container">
        <main class="usuarios" id="dashboardId">
            @include('components/sidebar-admin')
            <div class="dashboard">
                <h1> Usuários </h1>
                <hr class="line">
                <div class="utilitarios">
                    <a href="{{ route('users.create') }}" id="add">
                        <img src="{{ asset('assets\img\add.svg') }}" alt="Adicionar" id="icAdd">
                        <span>Adicionar</span>
                    </a>
                    <form method="GET" action="{{ route('users.index') }}" class="form_busca">
                        <input class="barra_de_busca" type="text" id="search" name="search" placeholder="Pesquisar em usuários... ">
                        <label for="search">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </label>
                    </form>
                </div>
                <div class="allUsuarios">
                    <div class="tags">
                        @foreach ($users as $user)
                            <div class="not">
                                <div class="nome_users">
                                    <p>{{ $user->name }}</p>
                                </div>
                                <div class="cargo_users">
                                    <p>{{ $user->role }}</p>
                                </div>
                                <div class="botoes">
                                    <a href="{{ route('users.show', $user->id) }}" target='_blank'>
                                        <span class="material-symbols-outlined">
                                            info
                                        </span>
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}" target='_blank'>
                                        <span class="material-symbols-outlined">
                                            edit
                                        </span>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display:inline; margin: 0px;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                                            <span class="material-symbols-outlined">
                                                close
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    </div>
                </div>
            </div>
        </main>
        @include('components/footer')
    </div>
</body>
