<div>
    @if ($paginator->hasPages())
        <ul class="flex justify-between">
            @if ($paginator->onFirstPage())
            <button class="px-5 py-2 rounded border shadow bg-white cursor-pointer disabled">Prev</button>
            @else
            <button class="px-5 rounded-lg py-2 bg-gray-400 cursor-pointer" wire:click="previousPage">Pre</button>
            @endif
            @foreach ($elements as $element)
            <div class="flex">
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-blue-500 text-white cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
                @else
                <li class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
                @endif
                @endforeach
                @endif
            </div>
            @endforeach
            @if ($paginator->hasMorePages())
            <button class="px-5 rounded-lg py-2 bg-gray-400 cursor-pointer" wire:click="nextPage">Next</button>
            @else
            <button class="px-5 rounded-lg py-2 bg-gray-200 cursor-pointer">Next</button>
            @endif
            
        </ul>
    @endif
</div>
