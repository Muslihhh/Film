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

    // Filter berdasarkan tahun (bisa lebih dari satu)
    if ($tahun = $request->input('tahun')) {
        $tahunArray = explode(',', $tahun);
        $query->whereIn('tahun_rilis', $tahunArray);
    }

    // Filter berdasarkan negara
    if ($negara = $request->input('negara')) {
        $query->where('id_negara', $negara);
    }

    // Filter berdasarkan genre (bisa lebih dari satu)
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
        'sinopsis' => 'required',
        'trailer' => 'nullable|url',
        'genres' => 'required|array',
        'genres.*' => 'exists:genre,id',
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

    // Simpan gambar jika ada
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('film_images', 'public');
        $film->image = $path;
    }
  
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
    public function show(Film $film)
{
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
    return view('user.film', compact('film', 'randomFilms'));
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
        'sinopsis' => 'required',
        'trailer' => 'nullable|url',
        'id_negara' => 'required|exists:negara,id',
        'tahun_rilis' => 'required|integer',
        'age_category' => 'required',
        'durasi' => 'required|integer',
        'genres' => 'required|array',
        'genres.*' => 'exists:genre,id',
    ]);

    $film->judul = $request->input('judul');
    $film->sinopsis = $request->input('sinopsis');
    $film->trailer = $request->input('trailer');
    $film->id_negara = $request->input('id_negara');
    $film->tahun_rilis = $request->input('tahun_rilis');
    $film->age_category = $request->input('age_category');
    $film->durasi = $request->input('durasi');

    $film->save();

    // Update genre film
    $film->genres()->sync($request->genres ?? []);
    ActivityLog::create([
        'id_user' => Auth::id(),
        'action' => 'Edit Film',
        'deskripsi' => 'Mengedit film : ' . $film->judul
    ]);
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
        $satubulan = Carbon::now()->subMonth();
        $query = Film::with('genres', 'negara')->where('tahun_rilis', '>=', $satubulan->month)->orderBy('tahun_rilis', 'desc');

        // 🔹 **Filter Umur**
        if (Auth::check()) {
            $usia = Carbon::parse(Auth::user()->tanggal_lahir)->age;
            $query->where('age_category', '<=', $usia);
        } else {
            $query->where('age_category', 0);
        }

        $films = $query->paginate(10);

        return view('user.film_list', [
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

        return view('user.film_list', [
            'title' => 'Film Rating Tertinggi',
            'films' => $films
        ]);
    }
}
