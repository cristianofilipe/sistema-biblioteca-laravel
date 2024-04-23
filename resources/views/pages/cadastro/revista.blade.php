@extends('layout.app')

@section('title', 'Cadastro | Revista')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')
<div class="form-container">
    <form action="{{ route('revista-store') }}" method="post">
        @csrf

        <h3 class="form-title">Cadastro de Revista</h3>
        
        <div class="div-form">
            <!-- Titulo do revista -->
            <div class="form-group">
                <label for="titulo">Titulo</label> 
                <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-input" placeholder="Galileu"><br>
                @if ($errors->has('titulo'))
                    <span style="color: red">{{ $errors->first('titulo') }}</p>
                @endif
            </div>

            <!-- Subtitulo da revista -->
            <div class="form-group">
                <label for="subtitulo">Subtitulo</label> 
                <input type="text" name="subtitulo" value="{{ old('subtitulo') }}" class="form-input" placeholder="Ciência, tecnologia, saúde, meio ambiente e inovação"><br>
                @if ($errors->has('subtitulo'))
                    <span style="color: red">{{ $errors->first('subtitulo') }}</p>
                @endif
            </div>
        </div>

        <div class="div-form">

            <!-- Data de entrada -->
            <div class="form-group">
                <label for="data_entrada">Data de entrada</label>
                <input type="date" name="data_entrada" id="data_entrada" class="form-input" value="{{ old('data_entrada') }}"><br>
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
        </div>

        <div class="div-form">    
            <!-- Exemplares -->
            <div class="form-group">
                <label for="qtd_material">Exemplares</label>
                <input type="number" name="qtd_material" id="qtd_material" class="form-input" placeholder="Ex: 4" value="{{ old('qtd_material') }}"><br>
                @if ($errors->has('qtd_material'))
                    <span style="color: red">{{ $errors->first('qtd_material') }}</span>
                @endif
            </div>

            <!-- Estante -->
            <div class="form-group">
                <label for="estante">Estante</label>
                <input type="number" name="estante" id="estante" class="form-input" class="form-input" placeholder="Ex: 6" value="{{ old('estante') }}">
                @if ($errors->has('estante'))
                    <span style="color: red">{{ $errors->first('estante') }}</span>
                @endif
            </div>
        </div>

        <div class="div-form">
            <button type="submit">Enviar</button>
        </div>
    </form>
</div>
@endsection