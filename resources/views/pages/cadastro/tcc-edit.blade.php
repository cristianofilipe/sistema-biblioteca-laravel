@extends('layout.app')

@section('title', 'Editar | TCC')

<link rel="stylesheet" href="{{ asset('/css/form.css') }}">

@section('content')

<div class="form-container">

    <form action="{{ route('tcc-update', $tcc->id_tcc) }}" method="post">
        @csrf
        @method('put')
        
        <h3 class="form-title">Editar TCC {{ $tcc->id_tcc }}</h3>

        <div class="div-form">
            <!--- Tema -->
            <div class="form-group">
                <label for="tema">Tema</label>
                <input type="text" name="tema" id="tema" class="form-input" value="{{ $tcc->tema }}"><br>
                @if ($errors->has('tema'))
                    <span style="color: red">{{ $errors->first('tema') }}</span>
                @endif
            </div>
        
            <!-- Orientador -->
            <div class="form-group">
                <label for="orientador">Orientador</label>
                <input type="text" name="orientador" id="orientador" class="form-input" value="{{ $tcc->orientador }}"><br>  
                @if ($errors->has('orientador'))
                    <span style="color: red">{{ $errors->first('orientador') }}</span>
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
            <!-- Ano -->
            <div class="form-group">
                <label for="ano">Ano</label>
                <input type="text" name="ano" class="form-input" value="{{ $tcc->ano }}">
                @if ($errors->has('ano'))
                    <span style="color: red">{{ $errors->first('ano') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">
            <!-- Curso -->
            <div class="form-group">
                <label for="curso">Curso</label>
                <select name="curso" id="curso">
                    <option value="{{0}}">Selecione</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id_curso }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
                @if ($errors->has('curso'))
                    <span style="color: red">{{ $errors->first('curso') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">   
            <!-- Data de entrada -->
            <div class="form-group">
                <label for="data_entrada">Data de entrada</label>
                <input type="date" name="data_entrada" id="data_entrada" class="form-input" value="{{ $tcc->material->data_entrada }}"><br>
                @if ($errors->has('data_entrada'))
                    <span style="color: red">{{ $errors->first('data_entrada') }}</span>
                @endif
            </div>

            <!-- Estante -->
            <div class="form-group">
                <label for="estante">Estante</label>
                <input type="number" name="estante" id="estante" class="form-input" value="{{ $tcc->material->estante }}" >
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