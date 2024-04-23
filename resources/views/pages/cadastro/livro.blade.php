@extends('layout.app')

@section('title', 'Cadastro | Livro')

<link rel="stylesheet" href="{{ asset('/css/form.css') }}">

@section('content')

<div class="form-container">
    <form action="{{ route('livro-store') }}" method="post">
        @csrf

        <h3 class="form-title">Cadastro de Livros</h3>

        <div class="div-form">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-input" placeholder="Ex: Ed. Manual e Plástica" value="{{ old('titulo') }}"><br>
                @if ($errors->has('titulo'))
                    <span style="color: red">{{ $errors->first('titulo') }}</span>
                @endif
            </div>
        
            <div class="form-group">
                <label for="ano_publicacao">Ano de publicacao</label>
                <input type="number" name="ano_publicacao" id="ano_publicacao" class="form-input" placeholder="Ex: 2021" value="{{ old('ano_publicacao ') }}"><br>  
                @if ($errors->has('ano_publicacao'))
                    <span style="color: red">{{ $errors->first('ano_publicacao') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="volume">Volume</label>
                <input type="text" name="volume" id="volume" class="form-input" placeholder="Ex: Volume 2" value="{{ old('volume') }}"><br>
                @if ($errors->has('volume'))
                    <span style="color: red">{{ $errors->first('volume') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">
            <div class="form-group">
                <label for="edicao">Edicao</label>
                <input type="text" name="edicao" id="edicao" class="form-input" placeholder="1. edição" value="{{ old('edicao') }}"><br>
                @if ($errors->has('edicao'))
                    <span style="color: red">{{ $errors->first('edicao') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="number" name="isbn" id="isbn" class="form-input" placeholder="Ex: 978-989-762-271-7" value="{{ old('isbn') }}"><br>
                @if ($errors->has('isbn'))
                    <span style="color: red">{{ $errors->first('isbn') }}</span>
                @endif
            </div>
        
            <div class="form-group">
                <label for="editora">Editora</label>
                <input type="text" name="editora" id="editora" class="form-input" placeholder="Editora Das Letras, S.A" value="{{ old('editora') }}"><br>
                @if ($errors->has('editora'))
                    <span style="color: red">{{ $errors->first('editora') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">   
            <div class="form-group">
                <label for="cdd">CDD</label>
                <input type="cdd" name="cdd" id="cdd" class="form-input" placeholder="Ex: 800" value="{{ old('cdd') }}"><br>
                @if ($errors->has('cdd'))
                    <span style="color: red">{{ $errors->first('cdd') }}</span>
                @endif
            </div>

            <div id="form-group">
                <div class="grupo" id="grupo">
                    <label for="autores">Autores</label>
                    <div class="autor-div">
                        <input type="text" name="autores[]" id="autores" class="form-input">
                        <button type="button" id="btnAdd" class="btnReducer">+</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="div-form">
            <div class="form-group">
                <label for="data_entrada">Data de entrada</label>
                <input type="date" name="data_entrada" id="data_entrada" class="form-input" value="{{ old('data_entrada') }}"><br>
                @if ($errors->has('data_entrada'))
                    <span style="color: red">{{ $errors->first('data_entrada') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="modo_aquisicao">Modo de aquisicao</label>
                <select name="modo_aquisicao" id="modo_aquisicao">
                    <option value="comprado">Comprado</option>
                    <option value="doado">Doado</option>
                    <option value="ofertado">Ofertado</option>
                </select><br>
                @if ($errors->has('modo_aquisicao'))
                    <span style="color: red">{{ $errors->first('modo_aquisicao') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="qtd_material">Exemplares</label>
                <input type="number" name="qtd_material" id="qtd_material" class="form-input" placeholder="Ex: 4" value="{{ old('qtd_material') }}"><br>
                @if ($errors->has('qtd_material'))
                    <span style="color: red">{{ $errors->first('qtd_material') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">    

            <div class="form-group">
                <label for="estante">Estante</label>
                <input type="number" name="estante" id="estante" class="form-input" class="form-input" placeholder="Ex: 6" value="{{ old('estante') }}">
                @if ($errors->has('estante'))
                    <span style="color: red">{{ $errors->first('estante') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">
            <button type="submit" class="btn-submit">Enviar</button>
        </div>
    </form> 
</div>
<script src="{{ asset('/js/form.js') }}"></script>

@endsection 