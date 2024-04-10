@extends('layout.app')

@section('title', 'Listagem de alunos')

@section('content')

<div class="container">
    <h3>Listagem de alunos</h3>

    <div class="mb-3">
        <a href="{{ route('cadastro-aluno') }}" class="btn btn-primary">Novo Aluno</a>
    </div>

    @if(count($alunos) > 0) 
        <table class="table table-striped table-responsive">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Turma</th>
                <th>Classe</th>
                <th>Curso</th>
                <th colspan="3">Acoes</th>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->id_aluno }}</td>
                        <td>{{ $aluno->pessoa->nome }}</td>
                        <td>{{ $aluno->pessoa->sexo }}</td>
                        <td>{{ $aluno->turma }}</td>
                        <td>{{ $aluno->classe }}</td>
                        <td>{{ $aluno->curso->nome }}</td>
                        <td><a href="{{ route('aluno-show', $aluno->id_aluno) }}" class="btn btn-primary">Ver mais</a></td>
                        <td><a href="{{ route('aluno-edit', $aluno->id_aluno) }}" class="btn btn-success" role="button">Editar</a></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $aluno->id_aluno }}">
                                Deletar
                            </button>
                        </td>
                    </tr>

                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $aluno->id_aluno }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $aluno->id_aluno }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Aluno {{ $aluno->id_aluno }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Voce tem a certeza que deseja deletar o aluno {{ $aluno->id_aluno }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nao</button>
                                    <form action="{{ route('aluno-destroy', $aluno->id_aluno) }}" method="post">
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