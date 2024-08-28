<!--Linkando Reset Css -->
<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<!-- Incluindo Design do Login -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!--Linkando Css -->
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
<main>
    <body>
        <img class="onibus_img" src="{{asset('assets/img/logoPref.png')}}" alt="">
        <div class="container login_container">
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="col div_form">
                    <div class="row form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    </div>
                    <div class="row form-group">
                        <label for="password">Senha</label>
                        <input id="password" class="form-control"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    </div>
                    <div class="row div_button">
                        <button type="submit" class="botao btn btn-black">{{ __('Entrar') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
    <footer class="footer">
        <span>Desenvolvido por <a href="">Secretaria Municipal de Ciência, Tecnologia, Inovação, Educação Profissional e Trabalho</a>.</span>
    </footer>
</main>


