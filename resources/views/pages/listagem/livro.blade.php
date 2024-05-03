@extends('layout.app')

@section('title', 'Listagem | Livros')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush

@section('content')

<div class="page-container">
    <div class="form-pesquisa">
        <h3 class="title" style="margin-bottom: 0">Pesquisa</h3>
        <form action="{{ route('listagem-livro') }}" method="get">
            @csrf
            <div class="div-form">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-input">
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" class="form-input">
                </div>
                <div class="form'group">
                    <label for="editora">Editora</label>
                    <input type="text" name="editora" id="editora" class="form-input">
                </div>
            </div>

            <div class="div-form">
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="form-input">
                </div>

                <div class="form-group">
                    <label for="ano">Ano de publicacao</label>
                    <input type="text" name="ano_publicacao" id="ano" class="form-input">
                </div>
                
                <div>
                    <label for="cdd">CDD</label>
                    <input type="number" name="cdd" id="cdd" class="form-input">
                </div>
            </div>

            <div class="div-form">
                <div class="form-group">
                    <label for="data_entrada">Data de entrada</label>
                    <input type="date" name="data_entrada" class="form-input">
                </div>
                <div class="form-group">
                    <label for="modo_aquisicao">Modo de aquisicao</label>
                    <select name="modo_aquisicao" id="modo_aquisicao">
                        <option value="">Seleccione</option>
                        <option value="comprado">Comprado</option>
                        <option value="doado">Doado</option>
                        <option value="ofertado">Ofertado</option>
                    </select><br>
                </div>
            </div>

            <div class="div-form">
                <button type="submit" class="btn show" style="margin-left: 20px">Pesquisar</button>
            </div>
            
        </form>  
    </div>

    <div class="content">
        <div class="top">
            <h3 class="title">Listagem de livros</h3>

            <div class="mb-3">
                <a href="{{ route('cadastro-livro') }}" class="btn create">Nova livro</a>
            </div>
        </div>

        @if(count($livros) > 0)
            <div class="list'container">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Volume</th>
                        <th>Ano de publicacao</th>
                        <th>Edição</th>
                        <th>Editora</th>
                        <th colspan="3">Acoes</th>
                    </thead>
                    <tbody>
                        @foreach($livros as $livro)
                            <tr>
                                <td>{{ $livro->id_livro }}</td>
                                <td>{{ Str::limit($livro->titulo, 15)}}</td>
                                <td>{{ $livro->volume }}</td>
                                <td>{{ $livro->ano_publicacao }}</td>
                                <td>{{ $livro->edicao }}</td>
                                <td>{{ $livro->editora }}</td>
                                <td><a href="{{ route('livro-show', $livro->id_livro) }}" class="btn show">Ver mais</a></td>
                                <td><a href="{{ route('livro-edit', $livro->id_livro) }}" class="btn edit" role="button">Editar</a></td>
                                <td>
                                    @can('acesso-autorizado')
                                        <button type="button" class="btn delete" id="btnOpen">Excluir</button>
                                    @endcan                
                                </td>
                            </tr>
                            <x-alert router="livro-destroy" idColumn="{{ $livro->id_livro }}" modalName="livro" />
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        @else
            <h2>Não há nenhum livro cadastrada</h2>
        @endif
    </div>
</div>
  
  
@endsection
