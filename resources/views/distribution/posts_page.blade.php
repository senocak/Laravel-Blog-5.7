@if ($paginator->hasPages()) 
    @if ($paginator->onFirstPage())  
    @else
        <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link"><i class="fa fa-angle-left"></i></a></li>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="page-item"><a class="page-link w3-disabled">{{ $element }}</a></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item"><a class="page-link active">{{ $page }}</a></li>
                @else
                    <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link"><i class="fa fa-angle-right"></i></a> </li>
    @endif 
@endif 