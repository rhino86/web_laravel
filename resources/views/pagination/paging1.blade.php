@if ($paginator->hasPages())
   
    <nav class="d-inline-block">
        <ul class="pagination mb-0 pagination-sm">
       
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#"><span><i class="fas fa-chevron-left"></i> Prev</span></a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-chevron-left"></i> Prev</a>
                </li>
            @endif

            @foreach ($elements as $element)
            
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif


            
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="#">{{ $page }}<span class="sr-only">(current)</span></a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next <i class="fas fa-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#"><span>Next <i class="fas fa-chevron-right"></i></span></a>
                </li>
            @endif
        </ul>
    </nav>
@endif 