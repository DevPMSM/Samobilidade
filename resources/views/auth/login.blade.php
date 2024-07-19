<!--Linkando Reset Css -->
<link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
<!-- Incluindo Design do Login -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Linkando o Css -->
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

<div class="sidenav">
    <div class="login-main-text">
        <img class="onibus_img" src="{{asset('assets/img/onibus.svg')}}" alt="">
        <p>Entre com sua conta de administrador</p>
    </div>
 </div>
 <div class="main">
    <div class="col-md-6 col-sm-12">
       <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input id="password" class="form-control"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                </div>
                <button type="submit" class="btn btn-black">{{ __('Entrar') }}</button>
            </form>
       </div>
    </div>
 </div>
