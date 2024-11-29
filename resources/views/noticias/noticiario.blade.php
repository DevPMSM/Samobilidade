<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notícias</title>
    <!--Links-->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/noticiario.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    @component('components.navbar')
    @endcomponent

    <div class="container">

        <div class="titulo">
            <h1> Notícias</h1>
            <div class="container-categorias">
            <div class="dropdown">
            <span class="material-symbols-outlined">
            lists
            </span>
                <div class="dropdown-menu">
                    @foreach ($noticias as $noticia)
                    <a href="{{ route('noticias.categorias', $noticia->categoria) }}" >
                        {{ $noticia->categoria }}
                    </a>
                    @endforeach
                </div>
            </div>
            </div>
        </div>

        <div class="card_container">
            @foreach ($noticias as $noticia)
                <div class="caixa_noticia">
                    <a href="{{ route('noticias.show', $noticia->id) }}" class="cards">
                        <div class="noticias_corpo">
                            <div class="notBar">
                                <h2> {{ $noticia->titulo }} </h2>
                                <p style="color: #075d85">{{ $noticia->categoria }}</p>
                            </div>
                            <div class="img_container_div">
                                <img class="card-img" src="{{ asset('img/imagens/' . $noticia->imagem) }}" alt="img">
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $noticia->subtitulo }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @component('components.footer')
    @endcomponent
</body>

</html>
