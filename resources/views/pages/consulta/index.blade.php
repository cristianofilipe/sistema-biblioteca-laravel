@extends('layout.app')

@section('title', 'Consultas')

@section('content')

<h3>Pagina de Consulta</h3>
<br>
<ul>
    <li><a href="{{ route('consulta-livro') }}">Livro</a></li>
    <li><a href="{{ route('consulta-tcc') }}">TCC</a></li>
    <li><a href="{{ route('consulta-revista') }}">Revista</a></li>
    <li><a href="{{ route('consulta-cd') }}">CD</a></li>
</ul>

@endsection