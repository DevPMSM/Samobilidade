<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/noticia.css') }}">

<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">
                

<div class="container">
    <div class="cardAdd">
        <h1> Adicionar  </h1>
        <hr> 

        <div class="divForm">
            <form class="form" action="{{ route('noticias.store')}}" method="post" id="noticiaForm">
                <input type="text" id="titulo" name="titulo" placeholder="Título"><br>
                <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo"><br>
                <input type="text" id="desc" name="desc" placeholder="Descrição"><br>

                <label for="imagem">
                    <div class="addImg">
                        <img src="{{asset('assets\img\camera.svg')}}"> </img>
                        <input type="file"  id="imagem" name="imagem" placeholder="Adicionar foto" >
                        <span>Adicionar Imagem</span>
                    </div>
                </label>
            </form>
        </div>

        <div class="footer">
            <img src="{{asset('assets\img\voltar.svg')}}" alt="Voltar" id="voltar">
            <button type="submit" form="noticiaForm" style="background: none; border: none; padding: 0;">
                <img src="{{asset('assets/img/send.svg')}}" alt="Send" id="save">
            </button>
        </div>
</div>
