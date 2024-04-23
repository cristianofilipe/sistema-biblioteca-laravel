<link rel="stylesheet" href="{{ asset('/css/paginate.css') }}">
<div class="pagination">
    {{-- Previous Page Link --}}
    @if ($revistas->onFirstPage())
        <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo;</span>
        </span>
    @else
        <a href="{{ $revistas->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($revistas as $page => $url)
        @if ($page == $revistas->currentPage())
            <span class="active">{{ $page }}</span>
        @else
            <a href="{{ $url }}">{{ $page }}</a>
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($revistas->hasMorePages())
        <a href="{{ $revistas->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
    @else
        <span class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo;</span>
        </span>
    @endif
</div>
