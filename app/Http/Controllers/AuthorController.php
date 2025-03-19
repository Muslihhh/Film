<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Genre;
use App\Models\Negara;
use App\Models\Komentar;
use App\Models\ActivityLog;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $user = Auth::user(); // Ambil Author yang sedang login

    // Query film hanya untuk Author yang sedang login
    $query = Film::with('genres', 'negara')
        ->where('id_user', $user->id) // 🔹 Hanya film milik Author ini
        ->select('film.*')
        ->selectSub(function ($subquery) {
            $subquery->selectRaw('COALESCE(AVG(komentar.rating), 0)')
                ->from('komentar')
                ->whereColumn('komentar.id_film', 'film.id');
        }, 'rating');

    if ($search = $request->input('search')) {
        $query->where('judul', 'LIKE', "%{$search}%");
    }

    if ($request->has('tahun')) {
        $query->whereIn('tahun_rilis', $request->tahun);
    }

    if ($request->has('negara')) {
        $query->whereIn('id_negara', $request->negara);
    }

    if ($request->has('genres') && is_array($request->genres) && count($request->genres) > 0) {
        $query->whereHas('genres', function ($q) use ($request) {
            $q->whereIn('genre_id', $request->genres);
        });
    }

    $sort = $request->input('sort', 'judul');
    $order = $request->input('order', 'asc');
    $allowedSorts = ['judul', 'tahun_rilis', 'rating', 'durasi'];

    if (!in_array($sort, $allowedSorts)) {
        $sort = 'judul'; // Default sorting
    }

    $films = $query->orderBy($sort, $order)->paginate(10)->appends(request()->query());

    return view('author.films.datafilm', [
        'films' => $films,
        'negaraList' => Negara::all(),
        'komens' => Komentar::all(),
        'negaras' => Negara::all(),
        'genres' => Genre::all(),
        'search' => $request->input('search'),
        'tahun' => $request->input('tahun'),
        'negara' => $request->input('negara'),
        'sort' => $sort,
        'order' => $order,
        'selectedGenres' => $request->input('genre', [])
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
    
        $film = new Film();
        $film->judul = $request->input('judul');
        $film->sinopsis = $request->input('sinopsis');
        $film->tahun_rilis = $request->input('tahun_rilis');
        $film->durasi = $request->input('durasi');
        $film->trailer = $request->input('trailer');
        $film->age_category = $request->input('age_category');
        $film->id_negara = $request->input('id_negara');
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('film_images', 'public');
            $film->image = $path;
        }
        $film->id_user = Auth::id();

        $film->save();

        $film->genres()->attach(array_values($request->genres));
        ActivityLog::create([
            'id_user' => Auth::id(),
            'action' => 'Tambah Film',
            'deskripsi' => 'Menambahkan film baru: ' . $film->judul
        ]);
    
        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    return redirect()->route('film.index')->with('success', 'Film berhasil diperbarui.');
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
        return redirect()->route('film.index')->with('success', 'Film berhasil dihapus.');
    }
}
