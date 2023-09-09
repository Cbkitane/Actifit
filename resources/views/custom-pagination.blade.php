<div class="my-custom-pagination">
        @if ($paginator->onFirstPage())
        <!-- Previous Page Link -->
        <span class="pagination-link disabled">Previous</span>
        @else
        <!-- Previous Page Link -->
        <a wire:click="previousPage" class="pagination-link">Previous</a>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
        <span class="pagination-ellipsis">{{ $element }}</span>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <!-- Current Page (Bolder Text) -->
        <span class="pagination-link current-page"><strong>{{ $page }}</strong></span>
        @else
        <!-- Other Page Links -->
        <a wire:click="gotoPage({{ $page }})" class="pagination-link">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
        <a wire:click="nextPage" class="pagination-link">Next</a>
        @else
        <span class="pagination-link disabled">Next</span>
        @endif
</div>