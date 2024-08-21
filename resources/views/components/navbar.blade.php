<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<!-- COMPONENTE DA NAVBAR -->
<body>
    
    <header class="navbar-header">
        <a class="navbar-logo" href="/">
            <img src="{{ asset('assets/img/logo-samobilidade.svg') }}" alt="Logo Samobilidade">
        </a>
        <nav class="navbar-actions">
            <ul class="navbar-list">
                <li class="navbar-items"><a href="/">Home</a></li>
                <li class="navbar-items"><a href="{{route('legislacoes')}}">Legislação</a></li>
                <li class="navbar-items"><a href="{{route('noticiario')}}">Notícias</a></li>
                <li class="navbar-items"><a href="#">Contato</a></li>
            </ul>
        </nav>
        <div class="navbar-button">
            <button class="navbar-login-button">
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="login-link">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="login-link">Login</a>
                        @endauth
                    </nav>
                @endif
            </button>
        </div>
        <button class="sidebar-toggle" aria-label="Open Sidebar">
            <span class="material-symbols-outlined" style="font-size:40px;">
                sort
            </span>
        </button>
        
        <!-- ESTRUTURA NAVBAR NO MOBILE -->
        <aside id="sidebar" class="sidebar">
        <nav class="sidebar-nav">
            <ul class="sidebar-list">
                <li class="sidebar-item-close">
                    <a class="sidebar-logo" href="/">
                        <img src="{{ asset('assets/img/onibus.svg') }}" alt="Logo Samobilidade">
                    </a>
                    <span id="close-btn" style="font-size: 40px;" class="material-symbols-outlined">
                    close
                    </span>
                </li>
                <li class="sidebar-item"><a href="/">Home</a></li>
                <li class="sidebar-item"><a href="{{route('legislacoes')}}">Legislação</a></li>
                <li class="sidebar-item"><a href="{{route('noticiario')}}">Notícias</a></li>
                <li class="sidebar-item"><a href="#">Contato</a></li>
                </ul>
                <div class="sidebar-item login-sidebar-button">
                    <button class="navbar-login-button">
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                <a href="{{ url('/dashboard') }}" class="login-link">Dashboard</a>
                                @else
                                <a href="{{ route('login') }}" class="login-link">Login</a>
                                @endauth
                            </nav>
                        @endif
                    </button>
                </div>
           
        </nav>
    </aside>
    <div id="overlay" class="overlay"></div>
    </header>
    <script>
        const sidebar = document.querySelector('#sidebar');
        const sidebarToggle = document.querySelector('.sidebar-toggle');
        const overlay = document.querySelector('#overlay');
        const closeButton = document.querySelector('#close-btn');

        function toggleSidebar() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        sidebarToggle.addEventListener('click', toggleSidebar);

        overlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        closeButton.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        document.addEventListener('click', function(event) {
            if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target) && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            }
        });
    </script>
</body>
