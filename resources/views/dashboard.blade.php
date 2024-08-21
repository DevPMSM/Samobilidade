<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

<!-- HTML BASE PARA A DASHBOARD, A ESTRUTURA SEGUE ESSES PADRÕES
PARA NÃO QUEBRAR A TELA -->
<body>
    <div class='container'>
        <main>
            <!-- COMPONENTE SIDEBAR FICA COMO PRIMEIRO ITEM DESSA TELA -->
            @include('components/sidebar-admin') 
            <!-- OS ITENS DA TELA DEVEM FICAR DENTRO DA DIV DASHBOARD -->
            <div class="dashboard">
                <h1>LOGADO</h1>
                @if ($user->role === 'admin')
                    <h2>Todos os usuários:</h2>
                @else
                    <h2>Seu perfil:</h2>
                @endif
                @foreach ($users as $user)
                        <li>{{ $user->name }}</li>
                @endforeach
            </div>
        </main>
        @include('components/footer')
    </div>
</body>
