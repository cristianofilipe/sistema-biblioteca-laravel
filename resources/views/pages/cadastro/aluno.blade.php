@extends('layout.app')

@section('title', 'Cadastro | Aluno')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')
<div class="form-container">
    <form action="{{ route('aluno-store') }}" method="post">
        @csrf

        <h3 class="form-title">Cadastro de Aluno</h3>

        <div class="div-form">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome"  value="{{ old('nome') }}" class="form-input"><br>
                @if ($errors->has('nome'))
                    <p style="color: red">{{ $errors->first('nome') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="classe">Classe</label>
                <input type="number" name="classe" id="classe"  value="{{ old('classe') }}" class="form-input"><br>
            </div>

            <div class="form-group">
                <label for="genero">Genero</label>
                <div>
                    <label for="masculino">Masculino</label> <input type="radio" name="sexo" id="masculino" value="M" class="form-input">
                </div>
                
                <div>
                    <label for="feminino">Feminino</label> <input type="radio" name="sexo" id="feminino" value="F" class="form-input">
                </div>

                @if ($errors->has('sexo'))
                    <p style="color: red">{{ $errors->first('sexo') }}</p>
                @endif
            </div>

        </div>

        <div class="div-form">
            <div class="form-group">
                <label for="turma">Turma</label>
                <input type="text" name="turma" id="turma"  value="{{ old('turma') }}" class="form-input"><br>
                @if ($errors->has('turma'))
                    <p style="color: red">{{ $errors->first('turma') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="curso">Curso</label>
                <select name="curso" id="curso">
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id_curso }}">{{ $curso->nome }}</option>
                    @endforeach
                </select><br>
                @if ($errors->has('curso'))
                    <p style="color: red">{{ $errors->first('curso') }}</p>
                @endif
            </div>
        </div>

        <div class="div-form">  
            <div id="telefones" class="form-group"> 
                <label for="telefones">Telefones:</label>
                <div>
                    <input type="tel" name="tel[]" id="" placeholder="telefone 1" class="form-input">
                    <input type="tel" name="tel[]" id="" placeholder="telefone 2" class="form-input">
                </div>
            </div>
        </div>

        <div class="div-form">
            <button type="submit" class="btn-submit">Enviar</button>
        </div>
    </form>
</div>

@endsection