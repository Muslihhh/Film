
<div>
    <button wire:click="toggleWatchlist"
        class="px-4n w-full py-2 rounded text-white {{ $isInWatchlist ? 'bg-green-500' : 'bg-blue-500' }}">
        {{ $isInWatchlist ? 'In Watchlist' : 'Add to Watchlist' }}
    </button>
</div>
