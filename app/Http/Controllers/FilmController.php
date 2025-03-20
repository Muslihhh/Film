<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Tahun;
use App\Models\Negara;
use App\Models\Komentar;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class filmcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Query awal dengan relasi dan subquery rating
    $query = Film::with('genres', 'negara')
    ->select('film.*')
        ->selectSub(function ($subquery) {
            $subquery->selectRaw('COALESCE(AVG(komentar.rating), 0)')
                ->from('komentar')
                ->whereColumn('komentar.id_film', 'film.id');
        }, 'rating');

    // Filter berdasarkan pencarian
    if ($search = $request->input('search')) {
        $query->where('judul', 'LIKE', "%{$search}%");
    }

    // Filter berdasarkan tahun 
    if ($tahun = $request->input('tahun')) {
        $query->whereIn('tahun_rilis', $tahun );
    }

    // Filter berdasarkan negara
    if ($negara = $request->input('negara')) {
        $query->where('id_negara', $negara);
    }

    // Filter berdasarkan genre 
    if ($request->has('genres') && is_array($request->genres) && count($request->genres) > 0) {
        $query->whereHas('genres', function ($q) use ($request) {
            $q->whereIn('genre_id', $request->genres);
        });
    }

    

    // Sorting
    $sort = $request->input('sort', 'judul'); // Default: urutkan berdasarkan judul
    $order = $request->input('order', 'asc'); // Default: ascending

    // Pastikan hanya kolom yang diperbolehkan yang bisa digunakan untuk sorting
    $allowedSorts = ['judul', 'tahun_rilis', 'rating', 'durasi'];
    if (!in_array($sort, $allowedSorts)) {
        $sort = 'judul'; // Default sorting
    }

    // Urutkan & Paginate
    $films = $query->orderBy($sort, $order)->paginate(10)->appends(request()->query());

    // Return view
    return view('admin.film.datafilm', [
        'films' => $films,
        'negaraList' => Negara::all(),
        'genres' => Genre::all(),
        'komens' => Komentar::all(),
        'negaras' => Negara::all(),
        'search' => $request->input('search'),
        'tahun' => $request->input('tahun'),
        'negara' => $request->input('negara'),
        'sort' => $sort,
        'order' => $order,
        'selectedGenres' => $request->input('genre', [])
    ]);
}


    public function create(){
        $genres = Genre::all();
        $negaras = Negara::all();
        return view('admin.film.addfilm', compact('genres','negaras'));
        

    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png',
            'sinopsis' => 'required',
            'trailer' => 'nullable|url',
            'genres' => 'required|array',
            'genres.*' => 'exists:genre,id',
            'cast'=> 'required',
            'id_negara' => 'required|exists:negara,id',
            'tahun_rilis' => 'required|integer',
            'age_category' => 'required',
            'durasi' => 'required|integer',
        ]);
    
        // Buat objek Film
        $film = new Film();
        $film->judul = $request->input('judul');
        $film->sinopsis = $request->input('sinopsis');
        $film->tahun_rilis = $request->input('tahun_rilis');
        $film->durasi = $request->input('durasi');
        $film->trailer = $request->input('trailer');
        $film->age_category = $request->input('age_category');
        $film->id_negara = $request->input('id_negara');
        $film->cast = $request->input('cast');
    
        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('film_images', 'public');
            $film->image = $path;
        }
        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('film_banners', 'public');
            $film->banner = $path;
        }
        $film->id_user = Auth::id();
        // **Simpan Film ke Database Sebelum Attach Genre**
        $film->save();
    
        // **Tambahkan Genre ke Tabel Pivot (Setelah Film Tersimpan)**
        $film->genres()->attach(array_values($request->genres));
        ActivityLog::create([
            'id_user' => Auth::id(),
            'action' => 'Tambah Film',
            'deskripsi' => 'Menambahkan film baru: ' . $film->judul
        ]);
    
        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Film $film, $slug)
{
    $film = Film::where('slug', $slug)->firstOrFail();
    $film->load(['genres', 'komentar.user', 'komentar.replies.user']); // Memuat komentar, balasan, dan user
    
    if (Auth::check()) {
        // 🔹 Ambil umur user berdasarkan tanggal lahir
        $usia = Carbon::parse(Auth::user()->tanggal_lahir)->age;
        // 🔹 Ambil film acak dengan batasan umur
        $randomFilms = Film::where('id', '!=', $film->id)
            ->where('age_category', '<=', $usia) // Filter sesuai usia user
            ->inRandomOrder()
            ->limit(5)
            ->get();
    } else {
        // 🔹 Jika user adalah guest, hanya tampilkan film "Semua Umur (SU)"
        $randomFilms = Film::where('id', '!=', $film->id)
            ->where('age_category', 0) // Hanya film untuk semua umur
            ->inRandomOrder()
            ->limit(5)
            ->get();
    }
    $reviewCount = $film->komentar()->whereNull('parent_id')->count();
    return view('user.film.film', compact('film', 'randomFilms', 'reviewCount'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'judul' => 'required',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'cast' => 'required',
            'sinopsis' => 'required',
            'trailer' => 'nullable|url',
            'id_negara' => 'required|exists:negara,id',
            'tahun_rilis' => 'required|integer',
            'age_category' => 'required',
            'durasi' => 'required|integer',
            'banner_status' => 'nullable|boolean',
            'genres' => 'required|array',
            'genres.*' => 'exists:genre,id',
        ]);

        // Update data film
        $film->update([
            'judul' => $request->judul,
            'sinopsis' => $request->sinopsis,
            'trailer' => $request->trailer,
            'id_negara' => $request->id_negara,
            'tahun_rilis' => $request->tahun_rilis,
            'age_category' => $request->age_category,
            'durasi' => $request->durasi,
            'cast' => $request->cast,
            'banner_status' => $request->has('banner_status'),
        ]);

        // Upload gambar utama
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($film->image) {
                Storage::disk('public')->delete($film->image);
            }
            $path = $request->file('image')->store('film_images', 'public');
            $film->image = $path;
        }

        // Upload banner
        if ($request->hasFile('banner')) {
            // Hapus banner lama jika ada
            if ($film->banner) {
                Storage::disk('public')->delete($film->banner);
            }
            $path = $request->file('banner')->store('film_banners', 'public');
            $film->banner = $path;
        }

        // Simpan perubahan
        $film->save();

        // Sync genre
        $film->genres()->sync($request->genres ?? []);

        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui.');
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::findOrFail($id);
        $film->genres()->detach();
        $film->delete();
        ActivityLog::create([
            'id_user' => Auth::id(),
            'action' => 'Hapus Film',
            'deskripsi' => 'Menghapus film : ' . $film->judul
        ]);
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus.');
    }

    public function latestFilms()
    {
        $satuBulanLalu = Carbon::now()->subMonth();
    
        // 🔹 Cek apakah menggunakan `tahun_rilis` atau `created_at`
        $query = Film::with('genres', 'negara')
            ->where('created_at', '>=', $satuBulanLalu) // Gunakan created_at untuk filter 1 bulan terakhir
            ->orderByDesc('created_at');
    
        // 🔹 **Filter Umur**
        if (Auth::check()) {
            $usia = Carbon::parse(Auth::user()->tanggal_lahir)->age;
            $query->where('age_category', '<=', $usia);
        } else {
            $query->where('age_category', 0);
        }
    
        $films = $query->paginate(10);
    
        return view('user.film.film_list', [
            'title' => 'Film Terbaru',
            'films' => $films
        ]);
    }

    /**
     * 🛠 Film dengan Rating Tertinggi
     */
    public function topRatedFilms()
    {
        $query = Film::with('genres', 'negara')
            ->select('film.*')
            ->selectSub(function ($subquery) {
                $subquery->selectRaw('COALESCE(AVG(komentar.rating), 0)')
                    ->from('komentar')
                    ->whereColumn('komentar.id_film', 'film.id');
            }, 'rating')
            ->orderByDesc('rating');

        // 🔹 **Filter Umur**
        if (Auth::check()) {
            $usia = Carbon::parse(Auth::user()->tanggal_lahir)->age;
            $query->where('age_category', '<=', $usia);
        } else {
            $query->where('age_category', 0);
        }

        $films = $query->paginate(10);

        return view('user.film.film_list', [
            'title' => 'Film Rating Tertinggi',
            'films' => $films
        ]);
    }
}
