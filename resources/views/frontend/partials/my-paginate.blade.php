@if ($paginator->hasPages())
    <div class="col-lg-12">
        <ul class="uren-pagination-box primary-color">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a aria-hidden="true">&lsaquo;</a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><a>{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="Next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="Next" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a aria-hidden="true">&rsaquo;</a>
                </li>
            @endif
        </ul>
    </div>
@endif


{{-- <div class="col-lg-12">
    <ul class="uren-pagination-box primary-color">
        <li class="active"><a href="javascript:void(0)">1</a></li>
        <li><a href="javascript:void(0)">2</a></li>
        <li><a href="javascript:void(0)">3</a></li>
        <li><a href="javascript:void(0)">4</a></li>
        <li><a href="javascript:void(0)">5</a></li>
        <li><a class="Next" href="javascript:void(0)">Next</a></li>
    </ul>
</div> --}}

<!-- <div class="pagination-style text-center">
                                <ul>
                                    <li><a class="prev" href="#"><i class="la la-angle-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a class="active" href="#">03</a></li>
                                    <li><a href="#">04</a></li>
                                    <li><a href="#">05</a></li>
                                    <li><a href="#">06</a></li>
                                    <li><a class="next" href="#"><i class="la la-angle-right"></i></a></li>
                                </ul>
                            </div> -->