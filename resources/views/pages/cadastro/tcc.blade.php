@extends('layout.app')

@section('title', 'Cadastro | TCC')

@section('content')

<h3>Cadastro de TCC</h3>
<form action="{{ route('tcc-teste') }}" method="get">
    @csrf
    <label for="titulo">Titulo</label><br>
    <input type="text" name="titulo" id="titulo"><br>

    <label for="orientador">Orientador</label><br>
    <input type="text" name="orientador" id="orientador"><br>

    <label>Autor(es)</label><br>
    <input type="text" name="autores[]" placeholder="Autor 1"><button onclick="add()">+</button>
    <div id="grupo">
        
    </div>

    <button type="submit">Enviar</button>
</form>

<script src="{{ asset('/js/form.js') }}"></script>
@endsection