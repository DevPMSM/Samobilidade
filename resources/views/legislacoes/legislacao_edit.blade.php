<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/noticia.css') }}">

<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">
                

<div class="container">
    <div class="cardAdd">
        <h1> Editar  </h1>
        <hr> 
        <div class="divForm">
            <form class="form" action="{{route('legislacao.update', $legislacao->id) }}" method="post" id="noticiaForm">
            @csrf
            @method('PUT')
                <input type="text" id="titulo" name="titulo" value="{{$legislacao->titulo}}"><br>
                <input type="text" id="resumo" name="resumo" value="{{$legislacao->resumo}}"><br>
                <input type="text" id="url" name="url" value="{{$legislacao->url}}"><br>
            </form>
        </div>

        <div class="footer">
            <div class="voltar">
                <img src="{{asset('assets\img\voltar.svg')}}" alt="Voltar" id="voltar">
                <span>Voltar</span>
            </div>

            <button class="editar" type="submit" form="noticiaForm" style="background: none; border: none; padding: 0;">
                <span>Editar</span>
                <img src="{{asset('assets\img\edit.svg')}}" alt="Editar" id="editar">
            </button>
        </div>
    
       
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
</script>
