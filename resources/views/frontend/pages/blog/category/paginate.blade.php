<div class="text-center py-3">
    <nav aria-label="Page navigation example" class="pagination-box">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($blog_posts->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link"><i class="la la-arrow-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $blog_posts->previousPageUrl() }}" aria-label="Previous">
                        <i class="la la-arrow-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($blog_posts->links()->elements[0] as $page => $url)
                @if ($page == $blog_posts->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($blog_posts->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $blog_posts->nextPageUrl() }}" aria-label="Next">
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
    <p class="fs-14 pt-2">Showing {{ $blog_posts->firstItem() }}-{{ $blog_posts->lastItem() }} of {{ $blog_posts->total() }}
        results</p>
</div>
