@extends('layout.app')

@section('title', 'Listagem | emprestimos')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush

@section('content')

<div class="page-container">
    <div class="content">
        <div class="top">
            <h3 class="title">Listagem de emprestimos</h3>

            <div class="mb-3">
                <a href="{{ route('cadastro-emprestimo') }}" class="btn create">Novo Emprestimo</a>
            </div>
        </div>

        @if(count($emprestimos) > 0)
            <div class="list'container">
                <table>
                    <thead>
                        <th>Professor</th>
                        <th>Livro</th>
                        <th>Data de emprestimo</th>
                        <th>Data de devolucao</th>
                        <th colspan="2">Acoes</th>
                    </thead>
                    <tbody>
                        @foreach($emprestimos as $emprestimo)
                            <tr>
                                <td>{{ $emprestimo->visitante->nome }}</td>
                                <td>{{ Str::limit($emprestimo->material->livro->titulo, 15)}}</td>
                                <td>{{ $emprestimo->data_emprestimo }}</td>
                                <td>
                                    @if (!is_null($emprestimo->data_devolucao))
                                        {{ $emprestimo->data_devolucao }}
                                    @else
                                        <span style="color: brown;">PENDENTE</span>
                                    @endif
                                    
                                </td>
                                <td><a href="#" class="btn show">Ver mais</a></td>
                                @if (is_null($emprestimo->data_devolucao))
                                    <td>
                                        <form action="{{ route('emprestimo-devolucao', $emprestimo->id_emprestimo) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button class="btn delete" type="submit">Devolver</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                            <x-alert router="emprestimo-devolucao" idColumn="{{ $emprestimo->id_emprestimo }}">
                                <p>Tem certeza que deseja devolver o livro {{ $emprestimo->material->livro->titulo }}</p>
                            </x-alert>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        @else
            <h2>Não há nenhum emprestimo cadastradao</h2>
        @endif
    </div>
</div> 
@endsection

