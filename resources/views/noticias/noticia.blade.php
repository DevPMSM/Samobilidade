<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/ver-noticia.css') }}">

<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">

<div class="container">
    <h1> {{$noticia->titulo}} </h1>
    <img src="{{asset('img/imagens/' . $noticia->imagem) }}" alt="img">
    <h2> {{$noticia->subtitulo}} </h2>
    <p>{{$noticia->texto}}</p>
</div>

<div class="footer">
    <a href="javascript:history.back()" class="voltar" >
        <img src="{{asset('assets\img\voltar.svg')}}" alt="Voltar" id="voltar">
        <span>Voltar</span>
    </a>
</div>