<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
    <div class="layout">
        <header class="header">
            <h4>Header</h4>
        </header>
        <hr>

        <aside class="sidebar">
            <h4>Sidebar</h4>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('cadastro-index') }}">Cadastro</a></li>
                <li><a href="{{ route('listagem-index') }}">Consulta</a></li>
                <li><a href="{{ route('emprestimos') }}">Emprestimos</a></li>
                <li><a href="{{ route('relatorios') }}">Relatorios</a></li>
            </ul>
        </aside>
        <hr>

        <main class="content">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>