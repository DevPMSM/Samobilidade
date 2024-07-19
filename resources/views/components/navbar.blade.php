<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">


<header class="navbar-header">
    <a class="navbar-logo" href="/">
        <img src="{{ asset('assets/img/logo-samobilidade.svg') }}" alt="Logo Samobilidade">
    </a>
    <div class='navbar-actions'>
        <a href="#">Home</a>
        <a href="#">Legislação</a>
        <a href="#">Notícias</a>
        <a href="#">Contato</a>
    </div>
    <div class="navbar-button">
        <button class="navbar-login-button">
            @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                Dashboard
            </a>
            @else
            <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
            Login
        </a>
        @endauth
    </nav>
    @endif
</button>
</div>
</header>