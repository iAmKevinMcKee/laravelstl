@if ($paginator->hasPages())
    <div class="flex items-center">
        @if ($paginator->onFirstPage())
            <span class="rounded-l rounded-sm border px-3 py-2 cursor-not-allowed no-underline">&laquo;</span>
        @else
            <a
                class="rounded-l rounded-sm border-t border-b border-l px-3 py-2 text-brand-dark hover:bg-brand-light no-underline"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
            >
                &laquo;
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="border-t border-b border-l px-3 py-2 cursor-not-allowed no-underline">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="border-t border-b border-l px-3 py-2 bg-stl-blue text-white no-underline">{{ $page }}</span>
                    @else
                        <a class="border-t border-b border-l px-3 py-2 hover:bg-brand-light text-brand-dark no-underline" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a class="rounded-r rounded-sm border px-3 py-2 hover:bg-brand-light text-brand-dark no-underline" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <span class="rounded-r rounded-sm border px-3 py-2 hover:bg-brand-light text-brand-dark no-underline cursor-not-allowed">&raquo;</span>
        @endif
    </div>
@endif