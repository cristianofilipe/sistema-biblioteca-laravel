@extends('layout.app')

@section('title', "Revista $revista->id_revista ");

@section('content')
    <p>{{ $revista->id_revista }}</p>
    <p>{{ $revista->titulo }}</p>
    <p>{{ $revista->subtitulo }}</p>
    <p>{{ $revista->material->modo_aquisicao }}</p>
    <p>{{ $revista->material->qtd_material }}</p>
    <p>{{ $revista->material->tipo_material }}</p>
    <p>{{ $revista->material->data_entrada }}</p>
@endsection