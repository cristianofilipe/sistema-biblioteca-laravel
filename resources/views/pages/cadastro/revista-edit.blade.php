@extends('layout.app')

@section('title', 'Editar a revista '. $revista->id_revista)

@section('content')

<h3>Editar Revista</h3>
<form action="{{ route('revista-update', $revista->id_revista) }}" method="post">
    @csrf
    @method('put')
    Titulo: <input type="text" name="titulo" id="titulo"  value="{{ $revista->titulo }}"><br>
    @if ($errors->has('titulo'))
        <p style="color: red">{{ $errors->first('titulo') }}</p>
    @endif

    Subtitulo: <input type="text" name="subtitulo" id="subtitulo" value="{{ $revista->subtitulo }}"><br>
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
    <br>

    Quantidade de material <input type="number" name="qtd_material" id="" value="{{ $revista->material->qtd_material }}"><br>
    @if ($errors->has('qtd_material'))
        <p style="color: red">{{ $errors->first('qtd_material') }}</p>
    @endif

    Data de entrada <input type="date" name="data_entrada" id="" value="{{ $revista->material->data_entrada }}"><br>
    @if ($errors->has('data_entrada'))
        <p style="color: red">{{ $errors->first('data_entrada') }}</p>
    @endif
    
    <button type="submit">Editar</button>
</form>
@endsection