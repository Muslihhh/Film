<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class genrecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::withCount('films')->get();
        $films = Film::all();
        $genreCount = Genre::count();
        return view('admin.genre.datagenre', compact('genres', 'genreCount', 'films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('admin.genre.addgenre', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_genre' => 'required',
        ]);
        
        $genre = new Genre();
        $genre->nama_genre = $request->nama_genre;
        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Genre berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
    public function update(Request $request, Genre $genre)
    {
      
            $request->validate([
                'nama_genre' => 'required|string|max:255|unique:genre,nama_genre,' . $genre->id,
            ]);

            $genre->nama_genre = $request->input('nama_genre');
            $genre->save();
        
            return redirect()->route('genres.index')->with('success', 'Genre berhasil diperbarui.');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Genre berhasil dihapus');
    }

    public function list(Request $request)
{
    $query = Film::with('genres');

    if ($request->has('genres') && is_array($request->genres) && count($request->genres) > 0) {
        $query->whereHas('genres', function ($q) use ($request) {
            $q->whereIn('genre_id', $request->genres);
        });
    }

    if (Auth::check()) {
        // Jika user login, filter film sesuai umur mereka
        $user = Auth::user();
        $usia = Carbon::parse($user->tanggal_lahir)->age;
        $query->where('age_category', '<=', $usia);
    } else {
        // Jika anonymous, hanya tampilkan film "Semua Umur (SU)"
        $query->where('age_category', 0);
    }

    $films = $query->get();
    $genres = Genre::all();

    return view('user.genre', compact('genres', 'films'));
}

}
