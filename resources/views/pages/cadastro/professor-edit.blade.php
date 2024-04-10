@extends('layout.app')

@section('title', 'Editar professor '. $professor->id_professor)

@section('content')

<h3>Editar professor</h3>
<form action="{{ route('professor-update', $professor->id_professor) }}" method="post">
    @csrf
    @method('put')
    Nome: <input type="text" name="nome" id="nome"  value="{{ $professor->pessoa->nome }}"><br>
    @if ($errors->has('nome'))
        <p style="color: red">{{ $errors->first('nome') }}</p>
    @endif

    Sexo: <br>
    <label for="masculino">Masculino</label> <input type="radio" name="sexo" id="masculino" value="M"><br>
    <label for="feminino">Feminino</label> <input type="radio" name="sexo" id="feminino" value="F"><br>
    @if ($errors->has('sexo'))
        <p style="color: red">{{ $errors->first('sexo') }}</p>
    @endif

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $professor->email }}">
    <br><br>
    <label>Cursos:</label><br>
    @foreach($cursos as $curso)
        <input type="checkbox" name="cursos[]" value="{{ $curso->id_curso }}"> {{ $curso->nome }} <br>
    @endforeach

    <label for="telefones">Telefones:</label>
    <div id="telefones" class="form-group mb-3">
        @foreach($professor->pessoa->telefones as $telefone)
            <input type="text" name="tel[]" value="{{ $telefone->numero }}"><br>
        @endforeach
    </div>

    <button type="submit">Editar</button>
</form>
@endsection