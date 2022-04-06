@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item">
            <a class="page-link" href="#">
                <i class="fas fa-long-arrow-alt-left"></i>
            </a>
        </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                    <i class="fas fa-long-arrow-alt-left"></i>
                </a>
            </li>
        @endif
        {{-- Pagination Elements --}}
        <!-- <li class="page-item"> -->
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <!-- <li class="disabled"><span>{{ $element }}</span></li>
                <button class="btn ps-btn"><span>...</span></button> -->
                <li class="page-item">...</li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item">
                            <a class="page-link active" href="#">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>   
                        </li>                             
                    @endif
                @endforeach
            @endif
        @endforeach
        <!-- </li> -->
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                <i class="fas fa-long-arrow-alt-right"></i>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="#">
                <i class="fas fa-long-arrow-alt-right"></i>
                </a>
            </li>
        @endif
    </ul>
@endif