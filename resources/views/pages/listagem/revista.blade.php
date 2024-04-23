@extends('layout.app')

@section('title', 'Listagem | Revista')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')

<div class="page-container">
    <div class="form-pesquisa">
        <h3 class="title" style="margin-bottom: 0">Pesquisa</h3>
        <form action="{{ route('listagem-revista') }}" method="get">
            @csrf
            <div class="div-form">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="number" name="id" class="form-input">
                </div>
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-input">
                </div>
                <div class="form-group">
                    <label for="titulo">Subtitulo</label>
                    <input type="text" name="subtitulo" class="form-input">
                </div>
                <div class="form-group">
                    <label for="data_entrada">Data de entrada</label>
                    <input type="date" name="data_entrada" class="form-input">
                </div>
            </div>

            <div class="div-form">
                <div class="form-group">
                    <label for="modo_aquisicao">Modo de aquisicao</label>
                    <select name="modo_aquisicao" id="modo_aquisicao">
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
            <h3 class="title">Listagem de revistas</h3>

            <div class="mb-3">
                <a href="{{ route('cadastro-revista') }}" class="btn create">Nova Revista</a>
            </div>
        </div>

        @if(count($revistas) > 0)
            <div class="list'container">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Modo de aquisicao</th>
                        <th>Data de entrada</th>
                        <th colspan="3">Acoes</th>
                    </thead>
                    <tbody>
                        @foreach($revistas as $revista)
                            <tr>
                                <td>{{ $revista->id_revista }}</td>
                                <td>{{ $revista->titulo }}</td>
                                <td>{{ $revista->material->modo_aquisicao }}</td>
                                <td>{{ $revista->material->data_entrada }}</td>
                                <td><a href="{{ route('revista-show', $revista->id_revista) }}" class="btn show">Ver mais</a></td>
                                <td><a href="{{ route('revista-edit', $revista->id_revista) }}" class="btn edit" role="button">Editar</a></td>
                                <td>
                                    @can('acesso-autorizado')
                                        <!-- Button trigger modal -->
                                        <form action="{{ route('revista-destroy', $revista->id_revista) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn delete">Excluir</button>
                                        </form>
                                    @endcan
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        @else
            <h2>Não há nenhuma revista cadastrada</h2>
        @endif
    </div>
</div>
  
  
@endsection