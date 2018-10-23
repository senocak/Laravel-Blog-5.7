@if ($paginator->hasPages()) 
    @if ($paginator->onFirstPage())  
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers">&laquo;</a>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <a class="page-numbers current">{{ $element }}</a>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a class="page-numbers current">{{ $page }}</a>
                @else
                    <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers">&raquo;</a> 
    @endif 
@endif 