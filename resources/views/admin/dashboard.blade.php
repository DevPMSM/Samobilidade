<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/indexUser.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>@yield('title', 'Samobilidade')</title>
</head>

<body>
    <div class="container">
        <main class="usuarios" id="dashboardId">
            @include('components/sidebar-admin')
            <div class="dashboard">
                <h1> Administrador </h1>
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
                                    <a href="{{ route('users.show', $user->id) }}">
                                        <span class="material-symbols-outlined">
                                            info
                                        </span>
                                    </a>
                                    @if($user->id !== $loggedInUserId)
                                    <a href="{{ route('users.edit', $user->id) }}">
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
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class = "navegar">
                        @if ($users->lastPage() > 1)
                            <ul class="pagination">
                                <li class="page-item {{ $users->onFirstPage() ? ' disabled' : '' }}">
                                    <a class="antes" href="{{ $users->previousPageUrl() }}" aria-label="Anterior">
                                        <span class="material-icons">chevron_left</span>
                                    </a>
                                </li>

                                @for ($page = max(1, $users->currentPage() - 2); $page <= min($users->lastPage(), $users->currentPage() + 2); $page++)
                                    <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $users->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endfor

                                <li class="page-item {{ $users->currentPage() == $users->lastPage() ? ' disabled' : '' }}">
                                    <a class="prox" href="{{ $users->nextPageUrl() }}" aria-label="Próximo">
                                        <span class="material-icons">chevron_right</span>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </main>
        @include('components/footer')
    </div>
</body>
