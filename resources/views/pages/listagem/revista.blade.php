@extends('layout.app')

@section('title', 'Listagem | Revista')

@section('content')

<div class="container">
    <h3>Listagem de revistas</h3>

    <div class="mb-3">
        <a href="{{ route('cadastro-revista') }}" class="btn btn-primary">Nova Revista</a>
    </div>

    @if(count($revistas) > 0) 
        <table class="table table-striped table-responsive">
            <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Subtitulo</th>
                <th>Modo de aquisicao</th>
                <th>Data de entrada</th>
                <th colspan="3">Acoes</th>
            </thead>
            <tbody>
                @foreach($revistas as $revista)
                    <tr>
                        <td>{{ $revista->id_revista }}</td>
                        <td>{{ $revista->titulo }}</td>
                        <td>{{ $revista->subtitulo }}</td>
                        <td>{{ $revista->material->modo_aquisicao }}</td>
                        <td>{{ $revista->material->data_entrada }}</td>
                        <td><a href="{{ route('revista-show', $revista->id_revista) }}" class="btn btn-primary">Ver mais</a></td>
                        <td><a href="{{ route('revista-edit', $revista->id_revista) }}" class="btn btn-success" role="button">Editar</a></td>
                        <td>
                            @can('adm-master')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $revista->id_revista }}">
                                    Deletar
                                </button>
                            @endcan
                            
                        </td>
                    </tr>

                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $revista->id_revista }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $revista->id_revista }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Revista {{ $revista->id_revista }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Voce tem a certeza que deseja deletar a revista {{ $revista->id_revista }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nao</button>
                                    <form action="{{ route('revista-destroy', $revista->id_revista) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-primary">Sim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
  
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection