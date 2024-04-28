@extends('layout.app')

@section('title', 'Cadastro | CD')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@endpush

@section('content')
<div class="form-container">
    <form action="{{ route('cd-update', $cd->id_cd) }}" method="post">
        @csrf
        @method('put')
        <h3 class="form-title">Editar CD</h3>
        
        <div class="div-form">
            <!-- Conteudo do cd -->
            <div class="form-group">
                <label for="conteudo">Conteudo</label> 
                <input type="text" name="conteudo" id="conteudo" value="{{ $cd->conteudo }}" class="form-input"><br>
                @if ($errors->has('conteudo'))
                    <span style="color: red">{{ $errors->first('conteudo') }}</p>
                @endif
            </div>

            <!-- Capacidade da cd -->
            <div class="form-group">
                <label for="capacidade">Capacidade</label> 
                <input type="text" name="capacidade" value="{{ $cd->capacidade }}" class="form-input" ><br>
                @if ($errors->has('capacidade'))
                    <span style="color: red">{{ $errors->first('capacidade') }}</p>
                @endif
            </div>
        </div>

        <div class="div-form">

            <!-- Data de entrada -->
            <div class="form-group">
                <label for="data_entrada">Data de entrada</label>
                <input type="date" name="data_entrada" id="data_entrada" class="form-input" value="{{ $cd->material->data_entrada }}"><br>
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
                <input type="number" name="qtd_material" id="qtd_material" class="form-input" placeholder="Ex: 4" value="{{ $cd->material->qtd_material }}"><br>
                @if ($errors->has('qtd_material'))
                    <span style="color: red">{{ $errors->first('qtd_material') }}</span>
                @endif
            </div>

            <!-- Estante -->
            <div class="form-group">
                <label for="estante">Estante</label>
                <input type="number" name="estante" id="estante" class="form-input" class="form-input" placeholder="Ex: 6" value="{{ $cd->material->estante }}">
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