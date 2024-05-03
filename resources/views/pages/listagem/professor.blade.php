@extends('layout.app')

@section('title', 'Listagem | Professores')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush

@section('content')

<div class="page-container">
    <div class="form-pesquisa">
        <h3 class="title" style="margin-bottom: 0">Pesquisa</h3>
        <form action="{{ route('listagem-professores') }}" method="get">
            @csrf
            <div class="div-form">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-input" value="{{ $_GET['nome'] ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-input" value="{{ $_GET['email'] ?? '' }}">
                </div>
                <div class="form'group">
                    <label for="genero">Genero</label>
                    <input type="text" name="genero" id="genero" class="form-input" value="{{ $_GET['genero'] ?? '' }}">
                </div>
            </div>

            <div class="div-form">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="form-input" value="{{ $_GET['telefone'] ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="curso">curso</label>
                    <input type="text" name="curso" id="curso" class="form-input" value="{{ $_GET['curso'] ?? '' }}">
                </div>

            </div>

            <div class="div-form">
                <button type="submit" class="btn show" style="margin-left: 20px">Pesquisar</button>
            </div>
            
        </form>  
    </div>

    <div class="content">
        <div class="top">
            <h3 class="title">Listagem de professores</h3>

            <div class="mb-3">
                <a href="{{ route('cadastro-professor') }}" class="btn create">Novo professor</a>
            </div>
        </div>

        @if(count($professores) > 0)
            <div class="list'container">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>nome</th>
                        <th>Email</th>
                        <th>Genero</th>
                        <th>Telefone</th>
                        <th colspan="3">Acoes</th>
                    </thead>
                    <tbody>
                        @foreach($professores as $professor)
                            <tr>
                                <td>{{ $professor->id_professor }}</td>
                                <td>{{ Str::limit($professor->visitante->nome, 15)}}</td>
                                <td>{{ $professor->email }}</td>
                                <td>{{ $professor->visitante->sexo }}</td>
                                <td>{{ $professor->visitante->telefones[0]->numero ?? '' }}</td>
                                <td><a href="{{ route('professor-show', $professor->id_professor) }}" class="btn show">Ver mais</a></td>
                                <td><a href="{{ route('professor-edit', $professor->id_professor) }}" class="btn edit" role="button">Editar</a></td>
                                <td>
                                    @can('acesso-autorizado')
                                        <button type="button" class="btn delete" id="btnOpen">Excluir</button>
                                    @endcan                
                                </td>
                            </tr>
                            <x-alert router="professor-destroy" idColumn="{{ $professor->id_professor }}" modalName="professor" />
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        @else
            <h2>Não há nenhum professor cadastrado</h2>
        @endif
    </div>
</div>

@endsection