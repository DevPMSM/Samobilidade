<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/noticiario.css') }}">


<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">

@component('components.navbar') @endcomponent

<div class="container">

    <div class="titulo">

        <h1> Noticiário <span>.</span> </h1>
        <br>

    </div>

    <div class="card_container">
        @foreach ($noticias as $noticia)
            <div class="cards" >
                <img class="card-img" src="{{asset('storage/img/'). '/' .$noticia->imagem}}" alt="Imagem de capa do card">
                <div class="notBar">
                    <h2> {{$noticia->titulo}} </h2>
                    <a href="{{route('noticias.show', $noticia->id)}}" class="ir" target="_blank" >
                        <img src="{{asset('assets\img\ir.svg')}}" alt="ir" id="ir">
                    </a>
                </div>

                <div class="card-body">
                    <p class="card-text">{{$noticia->texto}}</p>
                </div>
            </div>
            <br>
        @endforeach
    </div>
    @component('components.footer')
    @endcomponent
</div>

