@php
  use App\Models\Usuario;
  use Illuminate\Support\Facades\Auth;

  $totalUsuarios = Usuario::count();
  $usuarioLogado = Auth::getUser();

@endphp

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="{{ asset('/icons/css/all.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}" />

    @stack('styles')
  </head>

  <body>
    <!-- =================== START OF CONTAINER =================== -->
    <div class="container">
      <!-- =================== START OF ASIDE =================== -->
      <aside>
            <div class="top">
                <div class="logo">
                    <img src="{{ asset('/img/ipddf-logo.png') }}" alt="">
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
                    <a class="dropdown" id="testee">
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

                <div class="dropdown">
                  <a class="dropdown" id="testee">
                      <i class="fa-solid fa-book-open-reader"></i>
                      <h3>Visitantes</h3>
                  </a>
                  <div class="dropdown-content">
                      <a href="{{ route('listagem-alunos') }}">Alunos</a>
                      <a href="{{ route('listagem-professores') }}">Professores</a>
                  </div>
              </div>

              <a href="{{ route('listagem-consultas') }}">
                <i class="fa-solid fa-magnifying-glass"></i>
                <h3>Consultas</h3>
              </a>
              @can('acesso-autorizado')
                <a href="{{ route('listagem-usuarios') }}">
                    <i class="fa fa-users"></i>
                    <h3>Usuários</h3>
                    <span class="message-count">{{ $totalUsuarios }}</span>
                </a>
              @endcan

              @can('acesso-autorizado')
                <a href="{{ route('emprestimos') }}">
                  <i class="fa fa-handshake"></i>
                  <h3>Empréstimo</h3>
                </a>
              @endcan
              
              <a href="{{ route('relatorios') }}">
                  <i class="fa fa-file-text"></i>
                  <h3>Relatório</h3>
              </a>
              <a href="{{ route('logout') }}" id="logout">
                  <i class="fa fa-sign-out"></i>
                  <h3>Logout</h3>
              </a>
            </div>
        </aside>
      <!-- =================== END OF ASIDE =================== -->

      <!-- =================== START OF MAIN =================== -->
      <main>
        @yield('content')
      </main>
      <!-- =================== END OF MAIN =================== -->

      <!-- =================== START OF RIGHT =================== -->
      <div class="right">
        <!-- =================== START OF TOP =================== -->
        <div class="top">
          <button id="menu-btn">
            <span class="material-icons-sharp">menu</span>
          </button>
          <div class="theme-toggler">
            <span class="active material-icons-sharp">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
          </div>
          <div class="profile">
            <div class="info">
              <small class=""><strong>Login:</strong>
                {{ $usuarioLogado->email }}
              </small>
            </div>
         
          </div>
        </div>
        <!-- =================== END OF TOP =================== -->

      </div>
      <!-- =================== END OF RIGHT =================== -->
    </div>
    <!-- =================== END OF CONTAINER =================== -->
    <script src="{{ asset('/js/layout.js') }}"></script>
    <script src="{{ asset('/js/logout.js') }}"></script>

    @stack('scripts')
  </body>
</html>
