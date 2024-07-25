<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}"> 
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
            <div>Teste da index</div>

        </main>

        @include('components/footer')
    </div>
</body>