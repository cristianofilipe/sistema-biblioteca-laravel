@extends('layout.app')

@section('title', 'Cadastro | Professor')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')
<div class="form-container">
    <form action="{{ route('professor-store') }}" method="post">
        @csrf

        <h3 class="form-title">Cadastro de Professor</h3>

        <div class="div-form">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome"  value="{{ old('nome') }}" class="form-input"><br>
                @if ($errors->has('nome'))
                    <p style="color: red">{{ $errors->first('nome') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" id="email"  value="{{ old('email') }}" class="form-input"><br>
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
                    <div>
                        <label for="{{ $curso->nome }}">{{ $curso->nome }}</label><input type="checkbox" name="cursos[]" id="{{ $curso->nome }}" value="{{ $curso->id_curso }}" class="form-input">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="div-form">
            <div id="telefones" class="form-group">
                <label for="telefones">Telefones:</label>
                <input type="text" name="tel[]" class="form-input" placeholder="Telefone 1">
                <input type="text" name="tel[]" class="form-input" placeholder="Telefone 2">
            </div>
        </div>

        <div class="div-form">
            <button type="submit" class="btn-submit">Enviar</button>
        </div>
    </form>
</div>

@endsection