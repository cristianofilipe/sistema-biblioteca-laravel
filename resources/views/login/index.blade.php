<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="login-container">
        <form action="{{ route('login-auth') }}" method="post" class="login-form">
            @csrf
            <img src="{{ asset('/img/ipddf-logo.png') }}" alt="" class="logo">
            <span class="slogan">"Criados para educar, formados para servir"</span>

            @if (session()->has('erro'))
                <p style="color: #000; background-color: red;">{{ session()->get('erro') }}</p>
            @endif
            <div class="input-group">
                <span class="fa fa-envelope"></span>
                <input type="text" placeholder="E-mail" name="email">
                @if ($errors->has('email'))
                    <p class="mg-error">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="input-group">
                <span class="fa fa-lock"></span>
                <input type="password" placeholder="Senha" name="password">
                
                @if ($errors->has('password'))
                    <p class="mg-error">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <a href="#" class="forgot-password">Esqueceu a senha?</a>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
