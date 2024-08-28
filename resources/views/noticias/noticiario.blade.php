<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/noticiario.css') }}">


<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">

@component('components.navbar') @endcomponent

<div class="container">

    <div class="titulo">
        <h1> Notícias</h1>
    </div>

    <div class="card_container">
        @foreach ($noticias as $noticia)
            <a href="{{route('noticias.show', $noticia->id)}}" class="ir" target="_blank" >
                <div class="cards" >
                    <img class="card-img" src="{{asset('img/imagens/' . $noticia->imagem) }}" alt="img">
                    <div class="notBar">
                        <h2> {{$noticia->titulo}} </h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$noticia->texto}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    @component('components.footer')
    @endcomponent
</div>

