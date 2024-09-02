<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <title>@yield('title', 'Samobilidade')</title>
</head>
<!-- Remover comentarios antes de subir  -->
<!-- HTML BASE PARA A TELA PRINCIPAL, A ESTRUTURA SEGUE ESSES PADRÕES
PARA NÃO QUEBRAR A TELA -->
<body>
    <div class="container">
        @include('components/navbar')
        <!-- NORMALMENTE O CONTEUDO DA PAGINA VAI SER COLOCADO DENTRO
        DA MAIN PARA SER MOSTRADO E SE PRECISAR DE OUTRO ITEM, NO COMPONENTE -->
        <main>
            @yield('content')
                <article class="article">
                    <header class="section-header">
                        <h1 class="section-header-title">
                            Cidades mais inteligentes, pessoas mais felizes<span style="color: #209DD5;">.</span>
                        </h1>
                        <h2 class="section-header-subtitle">Mobilidade urbana para todos.</h2>
                        <p class="section-header-description">
                            O Plano de Mobilidade Urbana de São Mateus é um instrumento norteador de planejamento de ações
                            de curto, médio e longo prazo que tem como principal objetivo orientar para que as
                            ações e investimentos estejam de acordo com a visão da cidade.
                        </p>
                    </header>

                    <figure class="section-header-img">
                        <img src="/assets/img/transito.jpg" alt="Ônibus representando o transporte público">
                    </figure>
                </article>

                <section id="legislacao_section" class="section-leg">
                    <div class="section-legislacao">
                        <div class="section-legislacao-find">
                            <h2 class="section-legislacao-title">Busque aqui uma legislação</h2>
                            <form class="section-legislacao-form">
                                @csrf
                                <select class="section-legislacao-select" name="legislacao" id="legislacao">
                                    <option value="" disabled selected>Selecione uma legislação</option>
                                    @foreach ($legislacoes as $legislacao)
                                        <option value="{{ $legislacao->resumo }}">{{ $legislacao->titulo }}</option>
                                    @endforeach
                                </select>
                                <i><span class="material-symbols-outlined">keyboard_arrow_down</span></i>
                            </form>
                        </div>
                        <div class="section-legislacao-text">
                            <hr class="blue-bar" aria-hidden="true">
                            <p class="section-legislacao-description" id="legislacao-resumo">
                                Selecione uma legislação para ver o resumo aqui.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="section-noticias">
                    <div class="section-noticias-info">
                        <h2 class="section-noticias-title">Acompanhe as últimas notícias<span style="color: #209DD5;">.</span></h2>
                    </div>
                    <div class="section-noticias-carrossel" aria-label="Carrossel de notícias">
                        @foreach ($noticias as $noticia)
                        <a href="/noticia/{{$noticia->id}}">
                            <div class="carrossel-item">
                                <img class="carrossel-img" src="{{asset('img/imagens/' . $noticia->imagem) }}" alt="Noticia">
                                <h1 class="carrossel-titulo">{{$noticia->titulo}}</h1>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </section>
                <a class="section-noticias-link" href="{{route('noticias')}}" aria-label="Ver mais notícias">VER MAIS</a>

                <div class="form-contact">
                    <form id="contact-form" class="form-contact-us" action={{ route('site.contato') }} method="post">
                        @csrf
                        <h1 class="form-title">Fale Conosco</h1>
                        <div class="form-contact-us-actions">
                            <div class="form-contact-us-actions-data">
                                <input class="form-input" value="{{ old('nome') }}" type="text" id="nome" name="nome" placeholder="Nome" required>
                                <input class="form-input" value="{{ old('email') }}" type="email" id="email" name="email" placeholder="Email" required>
                                <input class="form-input" value="" type="text" id="telefone" name="telefone" placeholder="Telefone" required>
                                <input class="form-input" value="{{ old('assunto') }}" type="text" id="assunto" name="assunto" placeholder="Assunto" required>
                            </div>
                            <div class="form-contact-us-actions-text">
                                <textarea class="form-fields-textarea" id="mensagem" name="mensagem" placeholder="Escreva sua mensagem" required></textarea>
                                <button class="form-button" type="submit">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                @foreach ($errors->all() as $error)
                    <script>
                        alert("{{ $error }}");
                    </script>
                @endforeach
            </main>
        @include('components/footer')
    </div>
    <script>
        const telefoneInput = document.getElementById('telefone');

        telefoneInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 0) {
                value = '(' + value;
            }
            if (value.length > 3) {
                value = value.slice(0, 3) + ') ' + value.slice(3);
            }
            if (value.length > 10) {
                value = value.slice(0, 10) + '-' + value.slice(10, 14);
            }
            
            e.target.value = value;
        });
    </script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    $(document).ready(function(){

        $('.section-noticias-carrossel').slick({
            centerMode: true,
            infinite: true,
            slidesToShow: 3,
            dots: true,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    });

</script>

<script>
    // função para atualizar busca de legislação
    document.getElementById('legislacao').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const resumo = selectedOption.value;
        document.getElementById('legislacao-resumo').textContent = resumo;
    });
</script>
</body>
