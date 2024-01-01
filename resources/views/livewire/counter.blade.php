<div class="flex flex-row justify-center items-center gap-4 py-5">
    <button class="btn btn-info" wire:click="increment">+</button>
    <h1 class="text-3xl font-bold">{{ $counts }}</h1>
    <button class="btn btn-warning"  wire:click="decrement">-</button>
</div>