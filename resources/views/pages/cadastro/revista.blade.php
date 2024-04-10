@extends('layout.app')

@section('title', 'Cadastro | Revista')

@section('content')

<h3>Cadastro de Revista</h3>

<form action="{{ route('revista-store') }}" method="post">
    @csrf
    Titulo <input type="text" name="titulo" value="{{ old('titulo') }}"><br>
    @if ($errors->has('titulo'))
        <p style="color: red">{{ $errors->first('titulo') }}</p>
    @endif
    Subtitulo <input type="text" name="subtitulo" value="{{ old('subtitulo') }}"><br><br>
    @if ($errors->has('subtitulo'))
        <p style="color: red">{{ $errors->first('subtitulo') }}</p>
    @endif
    Modo de aquisicao
    <select name="modo_aquisicao" id="">
        <option value="comprado">Comprado</option>
        <option value="doado">Doado</option>
        <option value="ofertado">Ofertado</option>
    </select><br>
    @if ($errors->has('modo_aquisicao'))
        <p style="color: red">{{ $errors->first('modo_aquisicao') }}</p>
    @endif

    <br><br>
    Quantidade de material <input type="number" name="qtd_material" id="" value="{{ old('qtd_material') }}"><br>
    @if ($errors->has('qtd_material'))
        <p style="color: red">{{ $errors->first('qtd_material') }}</p>
    @endif

    Data de entrada <input type="date" name="data_entrada" id="" value="{{ old('data_entrada') }}"><br>
    @if ($errors->has('data_entrada'))
        <p style="color: red">{{ $errors->first('data_entrada') }}</p>
    @endif

    <button type="submit">Enviar</button>
</form>
@endsection