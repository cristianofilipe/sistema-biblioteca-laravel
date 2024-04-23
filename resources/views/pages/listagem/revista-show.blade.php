@extends('layout.app')

@section('title', "Revista $revista->id_revista ");

@section('content')
    <p> ID - {{ $revista->id_revista }}</p>
    <p> Revista - {{ $revista->titulo }}</p>
    <p> Subtitulo - {{ $revista->subtitulo }}</p>
    <p> Modo de aquisicao - {{ $revista->material->modo_aquisicao }}</p>
    <p> Quantidade - {{ $revista->material->qtd_material }}</p>
    <p> Data de Entrada - {{ $revista->material->data_entrada }}</p>
    <p> Estante - {{ $revista->material->estante }}</p>
    <p> Ativo - {{ $revista->material->ativo }}</p>
@endsection