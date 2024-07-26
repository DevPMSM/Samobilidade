<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/noticia.css') }}">

<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">
     
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>


<div class="container">
    <div class="cardAdd">
        <h1> Adicionar  </h1>
        <hr> 

        <div class="divForm">
            <form class="form" action="{{ route('noticias.store')}}" method="post" id="noticiaForm">
                @csrf
                <input type="text" id="titulo" name="titulo" placeholder="Título"><br>
                <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo"><br>
     

                <textarea name="texto" id="desc"></textarea>

                <label for="imagem">
                    <div class="addImg">
                        <img src="{{asset('assets\img\camera.svg')}}"> </img>
                        <input type="file"  id="imagem" name="imagem" placeholder="Adicionar foto" >
                        <span id="file-name">Adicionar Imagem</span>
                    </div>
                </label>
            </form>
        </div>

        <div class="footer">
            <a href="javascript:history.back()" >
                <img src="{{asset('assets\img\voltar.svg')}}" alt="Voltar" id="voltar">
            </a>
       
            <button type="submit" form="noticiaForm" style="background: none; border: none; padding: 0;">
                <img src="{{asset('assets/img/send.svg')}}" alt="Send" id="save">
            </button>
        </div>
</div>

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
    CKEDITOR.replace('desc');
</script>
