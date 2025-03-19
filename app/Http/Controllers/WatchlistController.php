<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index()
    {
        $watchlist = Watchlist::where('user_id', Auth::id())->with('film')->get();
        return view('user.film.watchlist', compact('watchlist'));
    }

    public function store(Request $request, $film_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk menambahkan ke watchlist.');
        }

        // Cek apakah film sudah ada di watchlist
        $exists = Watchlist::where('user_id', Auth::id())->where('film_id', $film_id)->exists();

        if (!$exists) {
            Watchlist::create([
                'user_id' => Auth::id(),
                'film_id' => $film_id,
            ]);

            return back()->with('success', 'Film ditambahkan ke watchlist!');
        }

        return back()->with('info', 'Film sudah ada di watchlist.');
    }

    public function toggleWatchlist(Request $request, $film_id)
{
    if (!Auth::check()) {
        return response()->json(['status' => 'error', 'message' => 'Silakan login untuk menambahkan ke watchlist.']);
    }

    $watchlist = Watchlist::where('user_id', Auth::id())->where('film_id', $film_id)->first();

    if ($watchlist) {
        // Jika film sudah ada di watchlist, hapus
        $watchlist->delete();
        return response()->json(['status' => 'removed']);
    } else {
        // Jika belum ada, tambahkan
        Watchlist::create([
            'user_id' => Auth::id(),
            'film_id' => $film_id,
        ]);
        return response()->json(['status' => 'added']);
    }
}


    public function destroy($film_id)
    {
        Watchlist::where('user_id', Auth::id())->where('film_id', $film_id)->delete();
        return back()->with('success', 'Film dihapus dari watchlist!');
    }
}
