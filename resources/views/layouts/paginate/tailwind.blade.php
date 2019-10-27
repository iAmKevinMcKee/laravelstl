@if ($paginator->hasPages())
    <ul class="flex items-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="p-2 rounded border cursor-not-allowed mr-2" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="" aria-hidden="true">&lsaquo;&lsaquo; Previous</span>
            </li>
        @else
            <li class="">
                <button type="button" class="p-2 rounded border hover:bg-blue-600 hover:text-white mr-2" wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;&lsaquo; Previous</button>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="p-2 rounded border cursor-not-allowed mr-2" aria-disabled="true"><span class="">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="p-2 rounded border bg-stl-blue text-white mr-2" aria-current="page"><span class="">{{ $page }}</span></li>
                    @else
                        <li class=""><button type="button" class="p-2 rounded border hover:bg-blue-600 hover:text-white mr-2" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="">
                <button type="button" class="p-2 rounded border hover:bg-blue-600 hover:text-white" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">Next &rsaquo;&rsaquo;</button>
            </li>
        @else
            <li class="" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="p-2 rounded border disabled cursor-not-allowed" aria-hidden="true">Next &rsaquo;&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
