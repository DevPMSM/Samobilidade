<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/indexNoticia.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title', 'Samobilidade')</title>
</head>

<body>
    <div class="container">
        <main class="noticias" id="dashboardId">
            @include('components/sidebar-admin')
            <div class="dashboard">
                <h1> Notícias </h1>
                <hr class="line">
                <div class="utilitarios">
                    <a href="{{ route('noticias.create') }}" id="add">
                        <img src="{{ asset('assets\img\add.svg') }}" alt="Adicionar" id="icAdd">
                        <span>Adicionar</span>
                    </a>
                    <form method="GET" action="{{ route('noticias.index') }}" class="form_busca">
                        <input class="barra_de_busca" type="text" id="search" name="search" placeholder="Pesquisar em Notícias... ">
                        <label for="search">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </label>
                    </form>
                </div>
                <div class="allNoticias">
                    <div class="tags">
                        @foreach ($noticias as $noticia)
                            <div class="not">
                                <div class="titulo_noticias">
                                    <p>{{ $noticia->titulo }}</p>
                                </div>
                                <div class="botoes">
                                    <a href="{{ route('noticias.show', $noticia->id) }}" target='_blank'>
                                        <span class="material-symbols-outlined">
                                            info
                                        </span>
                                    </a>
                                    <a href="{{ route('noticias.edit', $noticia->id) }}" target='_blank'>
                                        <span class="material-symbols-outlined">
                                            edit
                                        </span>
                                    </a>
                                    <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST"
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
                    <div class = "navegar">
                        @if ($noticias->lastPage() > 1)
                            <ul class="pagination">
                                <li class="page-item {{ $noticias->onFirstPage() ? ' disabled' : '' }}">
                                    <a class="antes" href="{{ $noticias->previousPageUrl() }}" aria-label="Anterior">
                                        <span class="material-icons">chevron_left</span>
                                    </a>
                                </li>

                                @for ($page = max(1, $noticias->currentPage() - 2); $page <= min($noticias->lastPage(), $noticias->currentPage() + 2); $page++)
                                    <li class="page-item {{ $page == $noticias->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $noticias->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endfor

                                <li class="page-item {{ $noticias->currentPage() == $noticias->lastPage() ? ' disabled' : '' }}">
                                    <a class="prox" href="{{ $noticias->nextPageUrl() }}" aria-label="Próximo">
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
