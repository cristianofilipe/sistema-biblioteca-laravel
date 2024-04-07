@extends('layout.app')

@section('title', 'Home')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/layout.css') }}">

<h3>Pagina de Home</h3>

@if(count($alunos) > 0) 
    @foreach($alunos as $aluno)
        <p>Nome: {{ $aluno->pessoa->nome }}</p>
        <p>Sexo: {{ $aluno->pessoa->sexo }}</p>
        <p>Classe: {{ $aluno->classe }}</p>
        <p>Turma: {{ $aluno->turma }}</p>
        <hr>
    @endforeach
@endif

<script src="{{ asset('/js/home-script.js') }}"></script>
@endsection