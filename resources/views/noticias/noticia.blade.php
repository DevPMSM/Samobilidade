<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$noticia->titulo}}</title>
        <link rel="stylesheet" href="{{ asset('assets/css/ver-noticia.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/reset_2.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
        <link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    </head>
    <body>
        @include('components/navbar')

        <div class="container">
            <h1 class="titulo"> {{$noticia->titulo}} </h1>
            <h1 class="categoria"> {{$noticia->categoria}} </h1>
            <h3 class="data_publi">Data de publicação <span>{{$noticia->created_at}}</span> </h3>
            <img class="img_noticia" src="{{asset('img/imagens/' . $noticia->imagem)}}" alt="Noticia">
            <!-- Exibe o conteúdo da notícia com formatação HTML -->
            <p class="texto_noticia">{!! $noticia->texto !!}</p>
        </div>

        <div class="volteBar">
            <a href="javascript:history.back()" class="voltar">
                <img src="{{asset('assets/img/voltar.svg')}}" alt="Voltar" id="voltar">
                <span>Voltar</span>
            </a>
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>
