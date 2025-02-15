<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/sidebar-admin-component.css') }}">
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<!-- COMPONENTE DA SIDEBAR USADO NO DASHBOARD ADMIN  -->

<body>
    <!-- BOTAO PARA ABRIR SIDEBAR NO MOBILE -->
    <button id="sidebarToggle" class="sidebar-toggle-btn">
        <span class="material-symbols-outlined" style="font-size: 35px;">menu</span>
    </button>

    <!-- SIDEBAR  -->
    <aside id="sidebar" class="sidebar">
        <div class="sidebar-container">
            <header class="sidebar-header">
                <h2 class="sidebar-name-title">Bem-Vindo(a) </h2>
            </header>
            <hr>
            <ul class="sidebar-table">
                @if (auth()->user()->hasRole('editor'))
                    <li class="sidebar-table-list">
                        <a href="/noticias-index" class="sidebar-table-item">
                            <span class="material-symbols-outlined" style="font-size: 35px;">newspaper</span>
                            Notícias
                        </a>
                    </li>
                    <li class="sidebar-table-list">
                        <a href="/legislacoes" class="sidebar-table-item">
                            <span class="material-symbols-outlined" style="font-size: 35px;">balance</span>
                            Legislação
                        </a>
                    </li>
                    <li class="sidebar-table-list">
                        <a href="/" class="sidebar-table-item">
                            <span class="material-symbols-outlined" style="font-size: 35px;">globe</span>
                            Página Inicial
                        </a>
                    </li>
                @endif
                @if (auth()->user()->hasRole('admin'))
                    <li class="sidebar-table-list">
                        <a href="/admin/users" class="sidebar-table-item">
                            <span class="material-symbols-outlined" style="font-size: 35px;">group</span>
                            Usuarios
                        </a>
                    </li>
                    <li class="sidebar-table-list">
                        <a href="/" class="sidebar-table-item">
                            <span class="material-symbols-outlined" style="font-size: 35px;">globe</span>
                            Página Inicial
                        </a>
                    </li>
                @endif
                <li class="sidebar-table-list">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="sidebar-btn sidebar-table-item" type="submit">
                            <span class="material-symbols-outlined" style="font-size: 35px;">login</span>
                            Sair
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <script>
        // EVENTO AO CLICAR NO BOTÃO DO MENU DA SIDEBAR
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const dashboard = document.getElementById('dashboardId');
            const toggleButton = document.getElementById('sidebarToggle');

            // AO CLICK, ADICIONA OU REMOVE A CLASSE SHOW
            toggleButton.addEventListener('click', function() {
                if (sidebar.classList.contains('show')) {
                    sidebar.classList.remove('show');
                    dashboard.classList.add('hidden');
                } else {
                    sidebar.classList.add('show');
                }
            });
        });
    </script>
</body>

</html>
