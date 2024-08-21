<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/indexNoticia.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title', 'Samobilidade')</title>
</head>

<body>
    <div class="container">
        @include('components/sidebar-admin')
        <main>
            <div class="noticias">
                <h1> Noticias </h1>
                <hr>
                <a href="{{ route('noticias.create') }}" id="add">
                    <img src="{{ asset('assets\img\add.svg') }}" alt="Adicionar" id="icAdd">
                    <span>Adicionar</span>
                </a>
                <form method="GET" action="{{ route('noticias') }}">
                    <input type="text" id="search" name="search" placeholder="Digite uma palavra chave"><br>
                    <button type="submit"> Buscar </button>
                </form>
                <div class="allNoticias">
                    @foreach ($noticias as $noticia)
                        <div class="not">
                            <p>{{ $noticia->titulo }}</p>
                            <div class="botoes">
                                <a href="{{ route('noticias.show', $noticia->id) }}" target='_blank'>
                                    <img src="{{ asset('assets\img\info.svg') }}" alt="Infor" id="info">
                                </a>
                                <a href="{{ route('noticias.edit', $noticia->id) }}" target='_blank'>
                                    <img src="{{ asset('assets\img\editar.svg') }}" alt="Editar" id="editar">
                                </a>
                                <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST"
                                    style="display:inline; margin: 0px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                                        <img src="{{ asset('assets/img/delete.svg') }}" alt="Deletar" id="delete">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
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
        </main>

        @include('components/footer')
    </div>
</body>
