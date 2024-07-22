<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/sidebar-admin-component.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<body>
    <button id="sidebarToggle" class="sidebar-toggle-btn">
        <span class="material-symbols-outlined" style="font-size: 35px;">menu</span>
    </button>
    <aside id="sidebar" class="sidebar">
        <header class="sidebar-header">
            <h1 class="sidebar-name-title">{{ $user->name }}</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="sidebar-btn" type="submit">
                    <span class="material-symbols-outlined" style="font-size: 35px;">login</span>
                    Sair
                </button>
            </form>
        </header>
        <hr>
        <ul class="sidebar-table">
            <li class="sidebar-table-list">
                <a href="#" class="sidebar-table-item">
                    <span class="material-symbols-outlined" style="font-size: 35px;">newspaper</span>
                    Notícias
                </a>
            </li>
            <li class="sidebar-table-list">
                <a href="#" class="sidebar-table-item">
                    <span class="material-symbols-outlined" style="font-size: 35px;">balance</span>
                    Legislação
                </a>
            </li>
        </ul>
    </aside>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function() {
            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            } else {
                sidebar.classList.add('show');
            }
        });
    });
    </script>
</body>
</html>
