<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">


<h1>LOGADO</h1>
<!-- Authentication -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Deslogar</button>
</form>
