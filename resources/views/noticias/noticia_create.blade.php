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
    <title>Adicionar</title>
    <!-- Quill Editor CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <main class="noticias" id="dashboardId">
            @include('components/sidebar-admin')
            <div class="noticia_create">
                <div class="form_container">
                    <h1>Adicionar</h1>
                    <hr class="linha">
                    <form class="form" action="{{ route('noticias.store')}}" method="post" id="noticiaForm" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="titulo" name="titulo" placeholder="Título"  maxlength="100" required ><br>
                        <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo"   maxlength="200" required><br>

                        <div class="quill_container">
                            <!-- Quill Editor Container -->
                            <div id="editor-container"></div>
                            <textarea name="texto" id="texto" style="display: none"></textarea>
                        </div>

                        <!-- Image Upload -->
                        <label class="imagem" for="imagem">
                            <div class="addImg" @required(true)>
                                <span class="material-symbols-outlined icon_span">
                                    photo_camera
                                </span>
                                <input type="file" id="imagem" name="imagem" style="display: none" placeholder="Adicionar foto" required>
                                <span class="img_span" id="file-name">Adicionar Imagem</span>
                            </div>
                        </label>
                    </form>

                    <div class="nav">
                        <a href="/noticias-index">
                            <img src="{{asset('assets/img/voltar.svg')}}" alt="Voltar" id="voltar">
                        </a>

                        <button type="submit" form="noticiaForm" style="background: none; border: none; padding: 0;">
                            <img src="{{asset('assets/img/send.svg')}}" alt="Enviar" id="save">
                        </button>
                    </div>
                </div>
            </div>
        </main>
        @include('components/footer')

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

            // Validação antes de enviar o formulário
            document.getElementById('noticiaForm').addEventListener('submit', function(e) {
                var text = quill.getText().trim();

                // Verifica se o texto está vazio
                if (text.length === 0) {
                    alert("O campo de texto é obrigatório.");
                    e.preventDefault(); // Impede o envio do formulário
                }

                // Verifica se o texto está dentro do limite de caracteres
                if (text.length > maxCharacters) {
                    alert("O texto não pode exceder " + maxCharacters + " caracteres.");
                    e.preventDefault(); // Impede o envio do formulário
                }
            });
        </script>


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
    </div>
</body>
</html>
