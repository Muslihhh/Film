<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Genre;
use App\Models\Negara;
use App\Models\Komentar;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboard()
    {

        $films = Film::all();
        $filmCount = Film::count();
        $user = User::all();
        $userCount = User::count();
        $newUsers = User::latest()->limit(5)->get();
        $newFilms = Film::latest()->limit(5)->get();
        $komenCount = Komentar::count();
        $genres = Genre::all();
        $komens = Komentar::all();
        $negaras = Negara::all();
        $topRatedFilms = Film::with('genres')
            ->select('film.*')
            ->selectSub(function ($query) {
                $query->selectRaw('COALESCE(AVG(komentar.rating), 0)')
                    ->from('komentar')
                    ->whereColumn('komentar.id_film', 'film.id');
            }, 'rating')
            ->orderByDesc('rating')
            ->limit(5)
            ->get();
            $logs = ActivityLog::with('user')->latest()->limit(10)->get();
            $cpuUsage = function_exists('sys_getloadavg') ? sys_getloadavg()[0] : 'N/A';
        $memoryUsage = round(memory_get_usage() / 1024 / 1024, 2); // RAM dalam MB
        $diskUsage = round(disk_free_space('/') / 1024 / 1024 / 1024, 2); // Disk dalam GB
        return view('admin.dashboard', compact('films','logs','cpuUsage','memoryUsage','diskUsage', 'newFilms', 'genres', 'topRatedFilms', 'komens', 'negaras', 'filmCount', 'user', 'newUsers', 'userCount', 'komenCount'));
    }

    public function authorDashboard()
    {
        $films = Film::where('id_user', Auth::id())->get();

        return view('author.dashboard', compact('films'));
    }

    public function subscriberDashboard()
{
    $query = Film::with('genres', 'negara');

    if ($search = request('search')) {
        $query->where('judul', 'LIKE', "%{$search}%");
    }

    if ($tahun = request('tahun')) {
        $tahunArray = explode(',', $tahun);
        $query->whereIn('tahun_rilis', $tahunArray);
    }

    if ($negara = request('negara')) {
        $query->where('id_negara', $negara);
    }

    if ($genre = request('genre')) {
        $query->whereHas('genres', function ($query) use ($genre) {
            $query->where('id', $genre);
        });
    }

    // 🔹 **FILTER UMUR**
    if (Auth::check()) {
        $user = Auth::user();
        $usia = Carbon::parse($user->tanggal_lahir)->age;
        $query->where('age_category', '<=', $usia);
    } else {
        // Jika guest, hanya film Semua Umur (SU) yang tampil
        $query->where('age_category', 0);
    }

    // **Film Terbaru**
    $latestFilms = (clone $query)->orderBy('tahun_rilis', 'desc')->limit(10)->get();

    // **Film dengan Rating Tertinggi**
    $topRatedFilms = (clone $query)
        ->select('film.*')
        ->selectSub(function ($subquery) {
            $subquery->selectRaw('COALESCE(AVG(komentar.rating), 0)')
                ->from('komentar')
                ->whereColumn('komentar.id_film', 'film.id');
        }, 'rating')
        ->orderByDesc('rating')
        ->limit(10)
        ->get();

    // **Film dengan Rating Terendah**
    

    // **Daftar Semua Film**
    $films = $query->paginate(10)->appends(request()->query());

    return view('user.home', [
        'latestFilms' => $latestFilms,
        'topRatedFilms' => $topRatedFilms,
        
        'films' => $films,
        'tahunList' => Film::select('tahun_rilis')->distinct()->orderBy('tahun_rilis', 'desc')->pluck('tahun_rilis'),
        'negaraList' => Negara::all(),
        'genres' => Genre::all(),
        'komens' => Komentar::all(),
        'negaras' => Negara::all(),
        'search' => request('search'),
        'tahun' => request('tahun'),
        'negara' => request('negara')
    ]);
}

}
