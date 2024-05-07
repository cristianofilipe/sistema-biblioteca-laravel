@extends('layout.app')

@section('title', 'Cadastro | Emprestimo')

<link rel="stylesheet" href="{{ asset('/css/form.css') }}">

@section('content')

<div class="form-container">
    <form action="{{ route('emprestimo-store') }}" method="post">
        @csrf

        <h3 class="form-title">Registro de Emprestimo</h3>

        @if (session('erro') || session('erro_emprestimo'))
            <div>
                <span style="padding: 10px; color: #fff; background-color: red;">
                    {{ session('erro') ?? session('erro_emprestimo') }}
                </span>
            </div>
        @endif


        <div class="div-form">
            <div class="form-group">
                <label for="titulo_livro">Titulo do livro</label>
                <input type="text" name="titulo_livro" id="titulo_livro" class="form-input" value="{{ old('titulo_livro') }}" onkeyup="carregar_usuarios(this.value)"><br>
                @if ($errors->has('titulo_livro'))
                    <span style="color: red">{{ $errors->first('titulo_livro') }}</span>
                @endif
                <span id="resultado pesquisa"></span>
            </div>
        
            <div class="form-group">
                <label for="nome_professor">Nome do professor</label>
                <input type="text" name="nome_professor" id="nome_professor" class="form-input" value="{{ old('nome_professor') }}"><br>  
                @if ($errors->has('nome_professor'))
                    <span style="color: red">{{ $errors->first('nome_professor') }}</span>
                @endif
            </div>
        </div>

        <div class="div form">
            <div class="form-group">
                <label for="data_emprestimo">Data de emprestimos</label>
                <input type="date" name="data_emprestimo" id="data_emprestimo" class="form-input" value="{{ old('data_emprestimo') }}">
            </div>
        </div>

        <div class="div-form">
            <button type="submit" class="btn-submit">Enviar</button>
        </div>

    </form> 
</div>
@endsection

@push('scripts')
    <script>
         async function carregar_usuarios(valor) {
            if (valor.length >= 3) {
                //console.log("Pesquisar: " + valor);

                const dados = await fetch('http://localhost/sistema-biblioteca/public/api/livros?titulo=' + valor);
                const resposta = await dados.json();
                //console.log(resposta);

                var html = "<ul class='list-group position-fixed'>";

                if (resposta['erro']) {
                    html += "<li class='list-group-item disabled'>" + resposta['msg'] + "</li>";
                } else {
                    for (i = 0; i < resposta['dados'].length; i++) {
                        html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>" + resposta['dados'][i].nome + "</li>";
                    }

                }
                html += "</ul>";

                document.getElementById('resultado_pesquisa').innerHTML = html;
            }
        }

        function get_id_usuario(id_usuario, nome) {
            //console.log("Id do usuario selecionado: " + id_usuario);
            //console.log("nome do usuario selecionado: " + nome);

            document.getElementById("usuario").value = nome;

            document.getElementById("id_usuario").value = id_usuario;
        }

        const fechar = document.getElementById('usuario');

        document.addEventListener('click', function (event) {
            const validar_clique = fechar.contains(event.target);
            if (!validar_clique) {
                document.getElementById('resultado_pesquisa').innerHTML = '';
            }
        });
    </script>
@endpush