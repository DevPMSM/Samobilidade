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
                asdas
                <h1>LOGADO</h1>
            </div>
        </main>
        @include('components/footer')
    </div>
</body>
