@extends('layout.app')

@section('title', 'Editar aluno '. $aluno->id_aluno)

@section('content')

<h3>Editar aluno</h3>
<form action="{{ route('aluno-update', $aluno->id_aluno) }}" method="post">
    @csrf
    @method('put')
    Nome: <input type="text" name="nome" id="nome"  value="{{ $aluno->pessoa->nome }}"><br>
    @if ($errors->has('nome'))
        <p style="color: red">{{ $errors->first('nome') }}</p>
    @endif

    Sexo: <br>
    <label for="masculino">Masculino</label> <input type="radio" name="sexo" id="masculino" value="M"><br>
    <label for="feminino">Feminino</label> <input type="radio" name="sexo" id="feminino" value="F"><br>
    @if ($errors->has('sexo'))
        <p style="color: red">{{ $errors->first('sexo') }}</p>
    @endif

    Classe: <input type="number" name="classe" id="classe"  value="{{ $aluno->classe }}"><br>
    @if ($errors->has('classe'))
        <p style="color: red">{{ $errors->first('sexo') }}</p>
    @endif

    Turma: <input type="text" name="turma" id="turma"  value="{{ $aluno->turma }}"><br>
    @if ($errors->has('turma'))
        <p style="color: red">{{ $errors->first('turma') }}</p>
    @endif

    Curso: 
    <select name="curso" id="curso">
        @foreach ($cursos as $curso)
            <option value="{{ $curso->id_curso }}">{{ $curso->nome }}</option>
        @endforeach
    </select><br>

    <label for="telefones">Telefones:</label>
    <div id="telefones" class="form-group mb-3">
        <input type="text" name="tel[]" value="{{ $telefones[0]->numero }}"><br>
        @if(empty($telefones[1]))
            <input type="text" name="tel[]">
        @else
            <input type="text" name="tel[]" value="{{ $telefones[1]->numero }}">
        @endif
    </div>
    <button type="submit">Editar</button>
</form>
@endsection