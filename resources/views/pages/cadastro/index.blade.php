@extends('layout.app')

@section('title', 'Cadastro')

@section('content')

<h3>Pagina de Cadastro</h3>
<br>
<ul>
    <li><a href="{{ route('cadastro-livro') }}">Livro</a></li>
    <li><a href="{{ route('cadastro-tcc') }}">TCC</a></li>
    <li><a href="{{ route('cadastro-revista') }}">Revista</a></li>
    <li><a href="{{ route('cadastro-cd') }}">CD</a></li>
    <li><a href="{{ route('cadastro-aluno') }}">Aluno</a></li>
</ul>

@endsection