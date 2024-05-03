@extends('layout.app')

@section('title', 'Emprestimos')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush

@section('content')


        @if(count($emprestimos) > 0)
            <div class="list'container">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Livro</th>
                        <th>Professor</th>
                        <th>Data de Emprestimos</th>
                        <th>Data de Devolucao</th>
                        <th colspan="3">Acoes</th>
                    </thead>
                    <tbody>
                        @foreach($emprestimos as $emprestimo)
                            <tr>
                                <td>{{ $emprestimo->id_emprestimo }}</td>
                                <td>{{ Str::limit($emprestimo->material->livro->titulo, 15)}}</td>
                                <td>{{ $emprestimo->visitante->professor->nome }}</td>
                                <td>{{ $emprestimo->data_emprestimo }}</td>
                                <td>{{ $emprestimo->data_devolucao }}</td>
                                <td><a href="{{ route('emprestimo-show', $emprestimo->id_emprestimo) }}" class="btn show">Ver mais</a></td>
                                <td><a href="{{ route('emprestimo-edit', $emprestimo->id_emprestimo) }}" class="btn edit" role="button">Editar</a></td>
                                <td>
                                    @can('acesso-autorizado')
                                        <button type="button" class="btn delete" id="btnOpen">Excluir</button>
                                    @endcan                
                                </td>
                            </tr>
                            <x-alert router="emprestimo-destroy" idColumn="{{ $emprestimo->id_emprestimo }}" modalName="emprestimo" />
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        @else
            <h2>Não há nenhum emprestimo cadastrada</h2>
        @endif
    </div>
</div>
  
  
@endsection
