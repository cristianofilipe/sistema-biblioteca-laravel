@extends('layout.app')

@section('title', "Aluno $aluno->id_aluno");

@section('content')
    <p>{{ $aluno->id_aluno }}</p>
    <p>{{ $aluno->pessoa->nome }}</p>
    <p>{{ $aluno->pessoa->sexo }}</p>
    <p>{{ $aluno->curso->nome }}</p>
    <p>{{ $aluno->turma }}</p>
    <p>{{ $aluno->classe }}</p>
    @foreach ($aluno->pessoa->telefones as $telefone)
        <p>{{ $telefone->numero }}</p>
    @endforeach
@endsection