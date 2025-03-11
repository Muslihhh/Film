<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::where('id_user', Auth::id())->paginate(10);
        return view('author.films.datafilm', compact('films'));
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
    
        return redirect()->route('dashboard.author')->with('success', 'Film berhasil ditambahkan.');
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
        return redirect()->route('author.dashboard')->with('success', 'Film berhasil diperbarui.');
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
        return redirect()->route('author.dashboard')->with('success', 'Film berhasil dihapus.');
    }
}
