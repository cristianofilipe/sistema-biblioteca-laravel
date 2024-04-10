@extends('layout.app')

@section('title', 'Cadastro | Aluno')

@section('content')

<h3>Cadastro de Alunos</h3>

<form action="{{ route('aluno-store') }}" method="post">
    @csrf
    Nome: <input type="text" name="nome" id="nome"  value="{{ old('nome') }}"><br>
    @if ($errors->has('nome'))
        <p style="color: red">{{ $errors->first('nome') }}</p>
    @endif

    Sexo: <br>
    <label for="masculino">Masculino</label> <input type="radio" name="sexo" id="masculino" value="M"><br>
    <label for="feminino">Feminino</label> <input type="radio" name="sexo" id="feminino" value="F"><br>
    @if ($errors->has('sexo'))
        <p style="color: red">{{ $errors->first('sexo') }}</p>
    @endif

    Classe: <input type="number" name="classe" id="classe"  value="{{ old('classe') }}"><br>
    @if ($errors->has('classe'))
        <p style="color: red">{{ $errors->first('sexo') }}</p>
    @endif

    Turma: <input type="text" name="turma" id="turma"  value="{{ old('turma') }}"><br>
    @if ($errors->has('turma'))
        <p style="color: red">{{ $errors->first('turma') }}</p>
    @endif

    Curso: 
    <select name="curso" id="curso">
        @foreach ($cursos as $curso)
            <option value="{{ $curso->id_curso }}">{{ $curso->nome }}</option>
        @endforeach
    </select><br>
    @if ($errors->has('curso'))
        <p style="color: red">{{ $errors->first('curso') }}</p>
    @endif

    <label for="telefones">Telefones:</label>
    <div id="telefones" class="form-group mb-3">
        <input type="tel" name="tel[]" id="" placeholder="telefone 1"><br><br>
        <input type="tel" name="tel[]" id="" placeholder="telefone 2"><br>
    </div>
    <button type="submit">Enviar</button>
</form>

@endsection