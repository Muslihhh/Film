<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;

class WatchlistButton extends Component
{
    public $film_id;
    public $isInWatchlist;

    public function mount($film_id)
    {
        $this->film_id = $film_id;
        $this->isInWatchlist = Watchlist::where('user_id', Auth::id())->where('film_id', $film_id)->exists();
    }

    public function toggleWatchlist()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk menambahkan ke watchlist.');
        }

        if ($this->isInWatchlist) {
            Watchlist::where('user_id', Auth::id())->where('film_id', $this->film_id)->delete();
            $this->isInWatchlist = false;
        } else {
            Watchlist::create([
                'user_id' => Auth::id(),
                'film_id' => $this->film_id,
            ]);
            $this->isInWatchlist = true;
        }
    }

    public function render()
    {
        return view('livewire.watchlist-button');
    }
}
