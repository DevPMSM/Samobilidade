<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/noticiario.css') }}">



<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">


<header>
    <h1> Noticiário <span>.</span> </h1>
    <br>
</header>

<div class="container">
    <div class="card_container">
        @foreach ($noticias as $noticia)
            <div class="cards" >
                <img class="card-img" src="{{asset('img/imagens/' . $noticia->imagem) }}" alt="Imagem de capa do card">
                <div class="notBar">
                    <h2> {{$noticia->titulo}} </h2>
                    <a href="{{route('mostrar_noticia', $noticia->id)}}" class="ir" >
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

</div>