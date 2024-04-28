@extends('layout.app')

@section('title', 'Cadastro | TCC')

<link rel="stylesheet" href="{{ asset('/css/form.css') }}">

@section('content')

<div class="form-container">
    <form action="{{ route('tcc-store') }}" method="post">
        @csrf

        <h3 class="form-title">Cadastro de TCC</h3>

        <div class="div-form">
            <div class="form-group">
                <label for="tema">Tema</label>
                <input type="text" name="tema" id="tema" class="form-input" value="{{ old('tema') }}"><br>
                @if ($errors->has('tema'))
                    <span style="color: red">{{ $errors->first('tema') }}</span>
                @endif
            </div>
        
            <div class="form-group">
                <label for="orientador">Orientador</label>
                <input type="text" name="orientador" id="orientador" class="form-input" value="{{ old('orientador') }}"><br>  
                @if ($errors->has('orientador'))
                    <span style="color: red">{{ $errors->first('orientador') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">   
            <div id="form-group">
                <div class="grupo" id="grupo">
                    <label for="autores">Autores</label>
                    <div class="autor-div">
                        <input type="text" name="autor" id="autor" class="form-input" placeholder="Autor 1 (obrigatório)" value="{{ old('autor') }}">
                        @if ($errors->has('autor'))
                            <br><span style="color: red">{{ $errors->first('autor') }}</span>
                        @endif

                        @for ($i = 0; $i < 4; $i++)
                            <input type="text" name="autores[]" id="autores" class="form-input" placeholder="Autor {{ $i + 1 }}">
                            @if ($errors->has("autores.$i"))
                                <br><span style="color: red">{{ $errors->first("autores.$i") }}</span>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <div class="div-form">
            <div class="form-group">
                <label for="ano">Ano</label>
                <input type="number" name="ano" id="ano" class="form-input" value="{{ old('ano') }}"><br>
                @if ($errors->has('ano'))
                    <span style="color: red">{{ $errors->first('ano') }}</span>
                @endif
            </div>

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
            <div class="form-group">
                <label for="data_entrada">Data de entrada</label>
                <input type="date" name="data_entrada" id="data_entrada" class="form-input" value="{{ old('data_entrada') }}"><br>
                @if ($errors->has('data_entrada'))
                    <span style="color: red">{{ $errors->first('data_entrada') }}</span>
                @endif
            </div>

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


@endsection 