<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/noticia.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>{{$noticia -> titulo}}</title>
    <!-- Quill Editor CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <main class="noticias" id="dashboardId">
            @include('components/sidebar-admin')
            <div class="noticia_create">
                <div class="form_container">
                    <h1>Editar</h1>
                    <hr class="linha">
                    <form class="form" action="{{route('noticias.update', $noticia->id) }}" method="post" id="noticiaForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <input type="text" id="titulo" name="titulo" placeholder="Título" value="{{$noticia->titulo}}" maxlength="100" ><br>
                        <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo" value="{{$noticia->subtitulo}}"  maxlength="200"><br>
                        <div class="quill_container">
                            <!-- Quill Editor Container -->
                            <div id="editor-container"></div>
                            <textarea name="texto" id="texto" style="display: none"></textarea>
                        </div>
                        <!-- Image Upload -->
                        @if(isset($noticia->imagem))

                            <label class="imagem" for="imagem">
                                <div class="addImg">
                                    <span class="material-symbols-outlined icon_span">
                                        photo_camera
                                    </span>
                                    <input type="file" id="imagem" name="imagem" style="display: none" placeholder="Adicionar foto" accept=".jpeg, .jpg, .png, .pdf, .jfif" value="{{$noticia->imagem}}" >
                                    <span id="file-name">{{$noticia->imagem}}</span>
                                </div>
                            </label>
                            <span>Imagem Selecionada:
                                <a href="{{asset('img/imagens').'/'.$noticia->imagem}}" class=" d-flex justify-content-center" target="_blank">{{$noticia->imagem}}</a>
                            </span>
                        @endif
                    </form>

                    <div class="nav">
                        <a href="/noticias-index">
                            <img src="{{asset('assets/img/voltar.svg')}}" alt="Voltar" id="voltar">
                        </a>

                        <button class="editar" type="submit" form="noticiaForm" style="background: none; border: none; padding: 0;">
                            <img src="{{asset('assets/img/send.svg')}}" alt="Enviar" id="save">
                        </button>
                    </div>
                </div>
            </div>
        </main>
        @include('components/footer')

        <!-- Script para inicializar o Quill e preencher com o conteúdo existente -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var maxCharacters = 500000; // Define o limite de caracteres

            var quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        [{ 'direction': 'rtl' }],
                        [{ 'size': ['small', false, 'large', 'huge'] }],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'font': [] }],
                        ['clean']
                    ]
                }
            });

            // Preenche o editor Quill com o texto existente da notícia
            quill.clipboard.dangerouslyPasteHTML(`{!! $noticia->texto !!}`);

            quill.on('text-change', function(delta, oldDelta, source) {
                // Atualiza o campo hidden com o conteúdo do Quill
                document.getElementById('texto').value = quill.root.innerHTML;

                // Verifica o número de caracteres
                var text = quill.getText().trim();
                if (text.length > maxCharacters) {
                    // Limita o texto ao máximo permitido
                    quill.deleteText(maxCharacters, text.length);
                }
            });

            document.getElementById('noticiaForm').addEventListener('submit', function(e) {
                // Always update the hidden textarea before submitting
                document.getElementById('texto').value = quill.root.innerHTML;

                var text = quill.getText().trim();

                // Verifica se o texto está dentro do limite de caracteres
                if (text.length > maxCharacters) {
                    alert("O texto não pode exceder " + maxCharacters + " caracteres.");
                    e.preventDefault(); // Impede o envio do formulário
                }
            });

        </script>
    </div>
</body>
</html>
