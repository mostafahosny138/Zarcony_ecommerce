@if ($paginator->hasPages())
    @if ($paginator->hasMorePages())

        <button class="btn btn-danger w-25 m-auto d-block do-paginate" data-url="{{ $paginator->nextPageUrl() }}" aria-label="Next">
            Load More
        </button>
    @endif

@endif
