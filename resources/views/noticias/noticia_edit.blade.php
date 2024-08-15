<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/noticia.css') }}">

<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">
                

<div class="container">
    <div class="cardAdd">
        <h1> Editar  </h1>
        <hr> 
        <div class="divForm">
            <form class="form" action="{{route('noticia.update', $noticia->id) }}" method="post" id="noticiaForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <input type="text" id="titulo" name="titulo" value="{{$noticia->titulo}}"><br>
                <input type="text" id="subtitulo" name="subtitulo" value="{{$noticia->subtitulo}}"><br>
                <input type="text" id="desc" name="texto" value="{{$noticia->texto}}"><br>

                <label for="imagem">
                    <div class="addImg">
                        <img src="{{asset('assets\img\camera.svg')}}"> </img>
                        <input type="file"  id="imagem" name="imagem" placeholder="Adicionar foto" >
                        <span id="file-name">{{$noticia->imagem}}</span>
                    </div>

                </label>
            </form>
        </div>

        <div class="nav">
            <a href="javascript:history.back()" class="voltar" >
                <img src="{{asset('assets\img\voltar.svg')}}" alt="Voltar" id="voltar">
                <span>Voltar</span>
            </a>

            <button class="editar" type="submit" form="noticiaForm" style="background: none; border: none; padding: 0;">
                <span>Editar</span>
                <img src="{{asset('assets\img\edit.svg')}}" alt="Editar" id="editar">
            </button>
        </div>
    
    </div>
</div>

@component('components.footer') @endcomponent

<script>
    document.getElementById('imagem').addEventListener('change', function() {
        const fileInput = this;
        const fileNameSpan = document.getElementById('file-name');
        
        if (fileInput.files.length > 0) {
            fileNameSpan.textContent = fileInput.files[0].name;
        } else {
            fileNameSpan.textContent = 'Adicionar Imagem';
        }
    });
</script>
