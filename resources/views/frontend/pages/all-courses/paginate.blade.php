<div class="text-center py-3">
    <nav aria-label="Page navigation example" class="pagination-box">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($all_courses->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link"><i class="la la-arrow-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $all_courses->previousPageUrl() }}" aria-label="Previous">
                        <i class="la la-arrow-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($all_courses->links()->elements[0] as $page => $url)
                @if ($page == $all_courses->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($all_courses->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $all_courses->nextPageUrl() }}" aria-label="Next">
                        <i class="la la-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link"><i class="la la-arrow-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
    <p class="fs-14 pt-2">Showing {{ $all_courses->firstItem() }}-{{ $all_courses->lastItem() }} of {{ $all_courses->total() }}
        results</p>
</div>
