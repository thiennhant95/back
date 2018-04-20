

<div class="col col-md-12"> {{$paginator->lastPage()}} 件中 {{$paginator->currentPage()}} ページ目 ({{$paginator->firstItem()}} ～ {{$paginator->lastItem()}} 件表示)<br>
    <div class="paging">
        <ul class="pagination pagination-sm">
            <!-- first Page Link -->
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>&lt;&lt;</span></li>
            @else
                <li><a href="{{$paginator->url(1)}}" rel="prev">&lt;&lt;</a></li>
            @endif
            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>&lt;</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a></li>
            @endif

            <!-- Pagination Elements -->
            @foreach ($elements as $element)
                <!-- "Three Dots" Separator -->
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                <!-- Array Of Links -->
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="current disabled"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a></li>
            @else
                <li class="disabled"><span>&gt;</span></li>
            @endif

            <!-- last Page Link -->
            @if ($paginator->lastPage() === $paginator->currentPage())
                <li class="disabled"><span>&gt;&gt;</span></li>
            @else
                <li><a href="{{$paginator->url($paginator->lastPage())}}" rel="prev">&gt;&gt;</a></li>
            @endif
        </ul>
        
    </div>
</div>