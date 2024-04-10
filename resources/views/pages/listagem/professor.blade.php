@extends('layout.app')

@section('title', 'Listagem de Professores')

@section('content')

<div class="container">
    <h3>Listagem de Professores</h3>

    <div class="mb-3">
        <a href="{{ route('cadastro-professor') }}" class="btn btn-primary">Novo Professor</a>
    </div>

    @if(count($professores) > 0) 
        <table class="table table-striped table-responsive">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Sexo</th>
                <th>Telefone</th>
                <th colspan="3">Acoes</th>
            </thead>
            <tbody>
                @foreach($professores as $professor)
                    <tr>
                        <td>{{ $professor->id_professor }}</td>
                        <td>{{ $professor->pessoa->nome }}</td>
                        <td>{{ $professor->email }}</td>
                        <td>{{ $professor->pessoa->sexo }}</td>
                        <td>{{ $professor->pessoa->telefones[0]->numero }}</td>
                        <td><a href="{{ route('professor-show', $professor->id_professor) }}" class="btn btn-primary">Ver mais</a></td>
                        <td><a href="{{ route('professor-edit', $professor->id_professor) }}" class="btn btn-success" role="button">Editar</a></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $professor->id_professor }}">
                                Deletar
                            </button>
                        </td>
                    </tr>

                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $professor->id_professor }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $professor->id_professor }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">professor {{ $professor->id_professor }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Voce tem a certeza que deseja deletar o professor {{ $professor->id_professor }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nao</button>
                                    <form action="{{ route('professor-destroy', $professor->id_professor) }}" method="post">
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