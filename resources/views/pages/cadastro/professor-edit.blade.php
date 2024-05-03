@extends('layout.app')

@section('title', 'Editar | Professor')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')
<div class="form-container">
    <form action="{{ route('professor-update', $professor->id_professor) }}" method="post">
        @csrf
        @method('put')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3 class="form-title">Cadastro de Professor</h3>

        <div class="div-form">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome"  value="{{ $professor->visitante->nome ?? old('nome') }}" class="form-input"><br>
                @if ($errors->has('nome'))
                    <p style="color: red">{{ $errors->first('nome') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" id="email"  value="{{ $professor->email ?? old('email') }}" class="form-input"><br>
            </div>

            <div class="form-group">
                <label for="genero">Genero</label>
                <div>
                    <label for="masculino">Masculino</label> <input type="radio" name="genero" id="masculino" value="M" class="form-input">
                </div>
                
                <div>
                    <label for="feminino">Feminino</label> <input type="radio" name="genero" id="feminino" value="F" class="form-input">
                </div>

                @if ($errors->has('genero'))
                    <p style="color: red">{{ $errors->first('genero') }}</p>
                @endif
            </div>

        </div>

        <div class="div-form">
            <div class="form-group">
                <label>Cursos:</label><br>
                @foreach($cursos as $curso)
                    <label for="{{ $curso->nome }}">{{ $curso->nome }}</label>
                    <input type="checkbox" id="{{ $curso->nome }}" name="cursos[]" value="{{ $curso->id_curso }}" 
                        {{ in_array($curso->id_curso, $cursosProf) ? 'checked' : '' }}
                    />
                @endforeach

            </div>
        </div>

        <div class="div-form">
            <div id="telefones" class="form-group">
                <label for="telefones">Telefones:</label>
                <input type="text" name="tel[]" class="form-input" placeholder="Telefone 1" value="{{ $telefones[0]->numero ?? old('tel[]') }}">
                <input type="text" name="tel[]" class="form-input" placeholder="Telefone 2" value="{{ $telefones[1]->numero ?? old('tel[]') }}">
            </div>
        </div>

        <div class="div-form">
            <button type="submit" class="btn-submit">Enviar</button>
        </div>
    </form>
</div>

@endsection