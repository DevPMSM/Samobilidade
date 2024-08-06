<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/legislacao.css') }}">

<link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">
                

<div class="container">
    <div class="cardAdd">
        <h1> Adicionar  </h1>
        <hr> 

        <div class="divForm">
            <form class="form" action="{{ route('legislacoes.store')}}" method="post" id="legislacaoForm">
                @csrf
                <input type="text" id="titulo" name="titulo" placeholder="Título"><br>
                <input type="text" id="resumo" name="resumo" placeholder="Resumo"><br>
                <input type="text" id="url" name="url" placeholder="URL"><br>
            </form>
        </div>

        <div class="nav">
            <a href="javascript:history.back()" >
                <img src="{{asset('assets\img\voltar.svg')}}" alt="Voltar" id="voltar">
            </a>
       
            <button type="submit" form="legislacaoForm" style="background: none; border: none; padding: 0;">
                <img src="{{asset('assets/img/send.svg')}}" alt="Send" id="save">
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
