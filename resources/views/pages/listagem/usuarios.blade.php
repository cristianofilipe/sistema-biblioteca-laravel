@extends('layout.app')

@section('title', 'Listagem | Usuarios')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')

<div class="page-container">
    <div class="content">
        <div class="top">
            <h3 class="title">Listagem de Usuarios</h3>

            <div class="mb-3">
                <a href="{{ route('cadastro-usuario') }}" class="btn create">Novo Usuarios</a>
            </div>
        </div>

        @if(count($usuarios) > 0)
            <div class="list'container">
                <table>
                    <thead>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo de Usuario</th>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->tipo_usuario }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        @else
            <h2>Não há nenhuma usuario cadastrado</h2>
        @endif
    </div>
</div>
  
  
@endsection