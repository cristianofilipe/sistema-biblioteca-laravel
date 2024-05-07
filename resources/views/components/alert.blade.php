@props(['router', 'idColumn', 'modalName'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush

<div>
    <dialog style="width: 30%; height: 20%">
        <form action="{{ route($router, $idColumn) }}" method="post">
            @csrf
            @method('delete')
            {{ $slot }}
            <button type="submit" class="btn show">Deletar</button>
            <button id="btnClose" type="button" class="btn create">Cancelar</button>
        </form>
    </dialog>
</div>

@push('scripts')
    <script src="{{ asset('/js/script.js') }}"></script>
@endpush