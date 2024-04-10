@extends('layout.app')

@section('title', 'Consultas')

@section('content')

<h3>Pagina de Listagem de dados</h3>
<br>
<ul>
    <li><a href="{{ route('listagem-livro') }}">Livro</a></li>
    <li><a href="{{ route('listagem-tcc') }}">TCC</a></li>
    <li><a href="{{ route('listagem-revista') }}">Revista</a></li>
    <li><a href="{{ route('listagem-cd') }}">CD</a></li>
    <li><a href="{{ route('listagem-professores') }}">Professores</a></li>
</ul>

@endsection