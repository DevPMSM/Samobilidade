<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/indexLegislacao.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title', 'Samobilidade')</title>
</head>

<body>
    <div class="container">
        <main class="legislacoes" id="dashboardId">
            @include('components/sidebar-admin')
            <div class="dashboard">
                <h1> Leis </h1>
                <hr class="line">
                <div class="utilitarios">
                    <a href="{{ route('legislacoes.create') }}" id="add">
                        <img src="{{ asset('assets\img\add.svg') }}" alt="Adicionar" id="icAdd">
                        <span>Adicionar</span>
                    </a>
                    <form method="GET" action="{{ route('legislacoes') }}" class="form_busca">
                        <input class="barra_de_busca" type="text" id="search" name="search" placeholder="Pesquisar nas Leis Cadastradas... ">
                        <label for="search">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </label>
                    </form>
                </div>
                <div class="allLegislacoes">
                    <div class="tags">
                        @foreach ($legislacoes as $legislacao)
                            <div class="not">
                                <p>{{ $legislacao->titulo }}</p>
                                <div class="botoes">
                                    <a href="https://www.google.com/" target='_blank' >
                                        <span class="material-symbols-outlined">
                                            info
                                        </span>                                    </a>
                                    <a href="{{route('legislacoes.edit', $legislacao->id)}}" target='_blank' >
                                        <span class="material-symbols-outlined">
                                            edit
                                        </span>                                    </a>

                                    <form action="{{ route('legislacoes.destroy', $legislacao->id) }}" method="POST" style="display:inline; margin: 0px;" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                                            <span class="material-symbols-outlined">
                                                close
                                            </span>                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class = "navegar">
                        @if ($legislacoes->lastPage() > 1)
                            <ul class="pagination">
                                <li class="page-item {{ $legislacoes->onFirstPage() ? ' disabled' : '' }}">
                                    <a class="antes" href="{{ $legislacoes->previousPageUrl() }}" aria-label="Anterior">
                                        <span class="material-icons">chevron_left</span>
                                    </a>
                                </li>

                                @for ($page = max(1, $legislacoes->currentPage() - 2); $page <= min($legislacoes->lastPage(), $legislacoes->currentPage() + 2); $page++)
                                    <li class="page-item {{ $page == $legislacoes->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $legislacoes->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endfor

                                <li class="page-item {{ $legislacoes->currentPage() == $legislacoes->lastPage() ? ' disabled' : '' }}">
                                    <a class="prox" href="{{ $legislacoes->nextPageUrl() }}" aria-label="Próximo">
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


