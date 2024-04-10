@extends('layout.app')

@section('title', 'Cadastro | Professor')

@section('content')

<h3>Cadastro de Professor</h3>

<form method="POST" action="{{ route('professor-store') }}">
    @csrf
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome">
    @if ($errors->has('nome'))
        <p style="color: red">{{ $errors->first('nome') }}</p>
    @endif

    <label for="sexo">Sexo:</label><br>
    <label for="masculino">Masculino</label>
    <input type="radio" name="sexo" id="masculino" value="M"><br>
    <label for="feminino">Feminino</label>
    <input type="radio" name="sexo" id="feminino" value="F"><br><br>
    @if ($errors->has('sexo'))
        <p style="color: red">{{ $errors->first('sexo') }}</p>
    @endif

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    @if ($errors->has('email'))
        <p style="color: red">{{ $errors->first('email') }}</p>
    @endif
    <br><br>
    <label>Cursos:</label><br>
    @foreach($cursos as $curso)
        <input type="checkbox" name="cursos[]" value="{{ $curso->id_curso }}"> {{ $curso->nome }} <br>
    @endforeach
    @if ($errors->has('cursos'))
        <p style="color: red">{{ $errors->first('cursos') }}</p>
    @endif

    <label for="telefones">Telefones:</label>
    <div id="telefones" class="form-group mb-3">
        <input type="text" name="tel[]" id="numero" placeholder="telefone 1">
        <input type="text" name="tel[]" id="numero" placeholder="telefone 2k">
    </div>
    @if ($errors->has('tel'))
        <p style="color: red">{{ $errors->first('tel') }}</p>
    @endif

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>


@endsection