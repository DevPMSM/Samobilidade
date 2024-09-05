<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/legislacao.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset ('assets/css/legislacao.css') }}"> --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Lei {{$legislacao->titulo}}</title>
</head>

<body>
    <div class="container">
        <main class="leis" id="dashboardId">
            @include('components/sidebar-admin')
            <div class="lei_create">
                <div class="form_container">
                    <h1>Adicionar</h1>
                    <hr class="linha">
                    <form class="form" action="{{route('legislacoes.update', $legislacao->id) }}" method="post" id="leiForm">
                        @csrf
                        @method('PUT')
                        <input type="text" id="titulo" name="titulo" maxlength="120" required placeholder="Título" value="{{$legislacao->titulo}}"><br>
                        <textarea id="resumo" name="resumo" maxlength="240" required placeholder="Resumo">{{$legislacao->resumo}}</textarea><br>
                        <input type="url" id="url" name="url" placeholder="URL" maxlength="120" required value="{{$legislacao->url}}"><br>
                    </form>
                    <div class="nav">
                        <a href="/legislacoes">
                            <img src="{{asset('assets/img/voltar.svg')}}" alt="Voltar" id="voltar">
                        </a>

                        <button type="submit" form="leiForm" style="background: none; border: none; padding: 0;">
                            <img src="{{asset('assets/img/send.svg')}}" alt="Enviar" id="save">
                        </button>
                    </div>
                </div>
            </div>
        </main>
        @include('components/footer')
    </div>
</body>
</html>
