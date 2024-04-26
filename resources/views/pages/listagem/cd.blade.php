@extends('layout.app')

@section('title', 'Listagem | CDs')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')

<div class="page-container">
    <div class="form-pesquisa">
        <h3 class="title" style="margin-bottom: 0">Pesquisa</h3>
        <form action="{{ route('listagem-cd') }}" method="get">
            @csrf
            <div class="div-form">
                <div class="form-group">
                    <label for="capacidade">Capacidade</label>
                    <input type="text" name="capacidade" class="form-input">
                </div>
                <div class="form-group">
                    <label for="conteudo">Conteudo</label>
                    <input type="text" name="conteudo" class="form-input">
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
            <h3 class="title">Listagem de CDs</h3>

            <div class="mb-3">
                <a href="{{ route('cadastro-cd') }}" class="btn create">Nova CD</a>
            </div>
        </div>

        @if(count($cds) > 0)
            <div class="list'container">
                <table>
                    <thead>
                        <th>Conteudo</th>
                        <th>Capacidade</th>
                        <th>Modo de aquisicao</th>
                        <th>Data de entrada</th>
                        <th colspan="3">Acoes</th>
                    </thead>
                    <tbody>
                        @foreach($cds as $cd)
                            <tr>
                                <td>{{ Str::limit($cd->conteudo, 15)}}</td>
                                <td>{{ $cd->capacidade }}</td>
                                <td>{{ $cd->material->modo_aquisicao }}</td>
                                <td>{{ $cd->material->data_entrada }}</td>
                                <td><a href="{{ route('cd-show', $cd->id_cd) }}" class="btn show">Ver mais</a></td>
                                <td><a href="{{ route('cd-edit', $cd->id_cd) }}" class="btn edit" role="button">Editar</a></td>
                                <td>
                                    @can('acesso-autorizado')
                                        <!-- Button trigger modal -->
                                        <form action="{{ route('cd-destroy', $cd->id_cd) }}" method="post">
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
            <h2>Não há nenhuma cd cadastrada</h2>
        @endif
    </div>
</div>
  
  
@endsection