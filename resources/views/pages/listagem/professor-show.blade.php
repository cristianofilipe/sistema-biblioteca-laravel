@extends('layout.app')

@section('title', "Professor $professor->id_professor ");

@section('content')
    <p>{{ $professor->id_professor }}</p>
    <p>{{ $professor->pessoa->nome }}</p>
    <p>{{ $professor->pessoa->sexo }}</p>
    Cursos: <br>
    @foreach($professor->cursos as $curso)
        <p>{{ $curso->nome }}</p>
    @endforeach
    Telefones: <br>
    @foreach($professor->pessoa->telefones as $telefone)
        <li>{{ $telefone->numero }}</li>
    @endforeach
@endsection