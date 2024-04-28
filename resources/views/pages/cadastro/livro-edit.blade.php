@extends('layout.app')

@section('title', 'Editar | Livro')

<link rel="stylesheet" href="{{ asset('/css/form.css') }}">

@section('content')

<div class="form-container">

    <form action="{{ route('livro-update', $livro->id_livro) }}" method="post">
        @csrf
        @method('put')
        
        <h3 class="form-title">Editar livro {{ $livro->id_livro }}</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="div-form">
            <!--- Titulo -->
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-input" value="{{ $livro->titulo ?? old('titulo') }}"><br>
                @if ($errors->has('titulo'))
                    <span style="color: red">{{ $errors->first('titulo') }}</span>
                @endif
            </div>
        
            <!-- Ano -->
            <div class="form-group">
                <label for="ano">Ano</label>
                <input type="text" name="ano_publicacao" id="ano" class="form-input" value="{{ $livro->ano_publicacao }}"><br>  
                @if ($errors->has('ano_publicacao'))
                    <span style="color: red">{{ $errors->first('ano_publicacao') }}</span>
                @endif
            </div>

            <!-- Volume -->
            <div class="form-group">
                <label for="volume">Volume</label>
                <input type="text" name="volume" class="form-input" value="{{ $livro->volume }}">
                @if ($errors->has('volume'))
                    <span style="color: red">{{ $errors->first('volume') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">   
            <!-- Autores -->
            <div id="form-group">
                <div class="grupo" id="grupo">
                    <label for="autores">Autores</label>
                    <div class="autor-div">
                        <input type="text" name="autor" class="form-input" value="{{ $autores[0]->nome }}">
                        @if ($errors->has('autor'))
                            <span style="color: red">{{ $errors->first('autor') }}</span>
                        @endif
                        @for ($index = 1; $index < 5; $index++)
                            @if (!isset($autores[$index]))
                                <input type="text" name="autores[]" class="form-input">
                            @else
                                <input type="text" name="autores[]" class="form-input" value="{{ $autores[$index]->nome }}">
                            @endif             
                        @endfor
                    </div>                  
                </div>
            </div>
        </div>

        <div class="div-form">
            <!-- Edicao -->
            <div class="form-group">
                <label for="edicao">Edicao</label>
                <input type="text" name="edicao" class="form-input" value="{{ $livro->edicao }}">
                @if ($errors->has('edicao'))
                    <span style="color: red">{{ $errors->first('edicao') }}</span>
                @endif
            </div>

            <!-- ISBN -->
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" class="form-input" value="{{ $livro->isbn }}">
                @if ($errors->has('isbn'))
                    <span style="color: red">{{ $errors->first('isbn') }}</span>
                @endif
            </div>

            <!-- Editora -->
            <div class="form-group">
                <label for="editora">Editora</label>
                <input type="text" name="editora" class="form-input" value="{{ $livro->editora }}">
                @if ($errors->has('editora'))
                    <span style="color: red">{{ $errors->first('editora') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">   
            <!-- Data de entrada -->
            <div class="form-group">
                <label for="data_entrada">Data de entrada</label>
                <input type="date" name="data_entrada" id="data_entrada" class="form-input" value="{{ $livro->material->data_entrada }}"><br>
                @if ($errors->has('data_entrada'))
                    <span style="color: red">{{ $errors->first('data_entrada') }}</span>
                @endif
            </div>

            <!-- Modo de aquisicao -->
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

            <!-- Exemplares -->
            <div class="form-group">
                <label for="qtd_material">Exemplares</label>
                <input type="number" name="qtd_material" id="qtd_material" class="form-input" placeholder="Ex: 4" value="{{ $livro->material->qtd_material }}"><br>
                @if ($errors->has('qtd_material'))
                    <span style="color: red">{{ $errors->first('qtd_material') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">
            <!-- Estante -->
            <div class="form-group">
                <label for="estante">Estante</label>
                <input type="number" name="estante" id="estante" class="form-input" value="{{ $livro->material->estante }}" >
                @if ($errors->has('estante'))
                    <span style="color: red">{{ $errors->first('estante') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">
            <button type="submit" class="btn-submit">Editar</button>
        </div>
    </form> 

</div>

@endsection 