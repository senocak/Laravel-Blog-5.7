@if ($paginator->hasPages()) 
    @if ($paginator->onFirstPage())  
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="w3-button">&laquo;</a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <a class="w3-button w3-disabled">{{ $element }}</a>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a class="w3-button w3-red">{{ $page }}</a>
                @else
                    <a href="{{ $url }}" class="w3-button">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="w3-button">&raquo;</a> 
    @endif 
@endif