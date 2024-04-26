@extends('layout.app')

@section('title', 'Listagem | TCC')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')

<div class="page-container">
    <div class="form-pesquisa">
        <h3 class="title" style="margin-bottom: 0">Pesquisa</h3>
        <form action="{{ route('listagem-tcc') }}" method="get">
            @csrf
            <div class="div-form">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="number" name="id" class="form-input">
                </div>
                <div class="form-group">
                    <label for="tema">Tema</label>
                    <input type="text" name="tema" class="form-input">
                </div>
                <div class="form-group">
                    <label for="orientador">Orientador</label>
                    <input type="text" name="orientador" class="form-input">
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" class="form-input">
                </div>
            </div>

            <div class="div-form">
                <div class="form-group">
                    <label for="data_entrada">Data de entrada</label>
                    <input type="date" name="data_entrada" class="form-input">
                </div>
            </div>

            <div class="div-form">
                <button type="submit" class="btn show" style="margin-left: 20px">Pesquisar</button>
            </div>
            
        </form>  
    </div>

    <div class="content">
        <div class="top">
            <h3 class="title">Listagem de TCC</h3>

            <div class="mb-3">
                <a href="{{ route('cadastro-tcc') }}" class="btn create">Novo TCC</a>
            </div>
        </div>

        @if(count($tccs) > 0)
            <div class="list'container">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Tema</th>
                        <th>Orientador</th>
                        <th>Data de entrada</th>
                        <th colspan="3">Acoes</th>
                    </thead>
                    <tbody>
                        @foreach($tccs as $tcc)
                            <tr>
                                <td>{{ $tcc->id_tcc }}</td>
                                <td>{{ Str::limit($tcc->tema, 15) }}</td>
                                <td>{{ $tcc->orientador }}</td>
                                <td>{{ $tcc->material->data_entrada }}</td>
                                <td><a href="{{ route('tcc-show', $tcc->id_tcc) }}" class="btn show">Ver mais</a></td>
                                <td><a href="{{ route('tcc-edit', $tcc->id_tcc) }}" class="btn edit" role="button">Editar</a></td>
                                <td>
                                    @can('acesso-autorizado')
                                        <!-- Button trigger modal -->
                                        <form action="{{ route('tcc-destroy', $tcc->id_tcc) }}" method="post">
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
            <h2>Não há nenhuma tcc cadastrado</h2>
        @endif
    </div>
</div>
  
  
@endsection