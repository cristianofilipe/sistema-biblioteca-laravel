@extends('layout.app')

@section('title', 'Listagem | Alunos')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')

<div class="page-container">
    <div class="form-pesquisa">
        <h3 class="title" style="margin-bottom: 0">Pesquisa</h3>
        <form action="{{ route('listagem-alunos') }}" method="get">
            @csrf
            <div class="div-form">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-input">
                </div>
                <div class="form-group">
                    <label for="classe">Classe</label>
                    <input type="text" name="classe" class="form-input">
                </div>
                <div class="form-group">
                    <label for="turma">Turma</label>
                    <input type="text" name="turma" class="form-input">
                </div>
            </div>

            <div class="div-form">
                <div class="form-group">
                    <label for="curso">Curso</label>
                    <select name="curso" id="curso">
                        <option value="{{0}}">Selecione</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id_curso }}">{{ $curso->nome }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('curso'))
                        <span style="color: red">{{ $errors->first('curso') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-input">
                </div>
            </div>

            <div class="div-form">
                <button type="submit" class="btn show" style="margin-left: 20px">Pesquisar</button>
            </div>
            
        </form>  
    </div>

    <div class="content">
        <div class="top">
            <h3 class="title">Listagem de Alunos</h3>

            <div class="mb-3">
                <a href="{{ route('cadastro-aluno') }}" class="btn create">Novo Aluno</a>
            </div>
        </div>

        @if(count($alunos) > 0)
            <div class="list'container">
                <table>
                    <thead>
                        <th>Nome</th>
                        <th>Classe</th>
                        <th>Turma</th>
                        <th>Curso</th>
                        <th colspan="3">Acoes</th>
                    </thead>
                    <tbody>
                        @foreach($alunos as $aluno)
                            <tr>
                                <td>{{ Str::limit($aluno->visitante->nome, 15)}}</td>
                                <td>{{ $aluno->classe }}</td>
                                <td>{{ $aluno->turma }}</td>
                                <td>{{ $aluno->curso->nome }}</td>
                                <td><a href="{{ route('aluno-show', $aluno->id_aluno) }}" class="btn show">Ver mais</a></td>
                                <td><a href="{{ route('aluno-edit', $aluno->id_aluno) }}" class="btn edit" role="button">Editar</a></td>
                                <td>
                                    @can('acesso-autorizado')
                                        <!-- Button trigger modal -->
                                        <form action="{{ route('aluno-destroy', $aluno->id_aluno) }}" method="post">
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
            <h2>Não há nenhuma aluno cadastrada</h2>
        @endif
    </div>
</div>
  
  
@endsection