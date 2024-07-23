<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/noticia.css') }}">

<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">
                

<div class="container">
    <div class="cardAdd">
        <h1> Editar  </h1>
        <hr> 
        <div class="divForm">
            <form class="form">
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
            <div class="voltar">
                <img src="{{asset('assets\img\voltar.svg')}}" alt="Voltar" id="voltar">
                <span>Voltar</span>
            </div>
            <div class="editar">
                <span>Editar</span>
                <img src="{{asset('assets\img\edit.svg')}}" alt="Editar" id="editar">
            </div>
        </div>
    
       
    </div>
</div>
