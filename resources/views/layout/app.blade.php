<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="img/images-Photoroom.png-Photoroom.png" alt="">
                    <h2>IP<span class="danger">DDF</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="sidebar">
                <a href="{{ route('home') }}" class="active">
                    <i class="fa fa-home"></i>
                    <h3>Home</h3>
                </a>
                <div class="dropdown">
                    <a href="#" class="dropdown" id="testee">
                        <i class="fa fa-plus"></i>
                        <h3>Acervo</h3>
                    </a>
                    <div class="dropdown-content">
                        <a href="{{ route('listagem-livro') }}">Livro</a>
                        <a href="{{ route('listagem-revista') }}">Revista</a>
                        <a href="{{ route('listagem-tcc') }}">Tcc</a>
                        <a href="{{ route('listagem-cd') }}">Cd</a>
                    </div>
                </div>
       
                <a href="usuario.html">
                    <i class="fa fa-users"></i>
                    <h3>Admnistradores</h3>
                </a>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <h3>Usuários</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="{{ route('emprestimos') }}">
                    <i class="fa fa-handshake-o"></i>
                    <h3>Empréstimo</h3>
                </a>
                <a href="{{ route('relatorios') }}">
                    <i class="fa fa-file-text-o"></i>
                    <h3>Relatório</h3>
                </a>
                <a href="{{ route('logout') }}" id="logout">
                    <i class="fa fa-sign-out"></i>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- Fim sidebar -->

        <main>
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>