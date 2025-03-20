<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function index(Film $film)
{
    $komentars = Komentar::with(['user', 'film'])->latest()->paginate(10);
    return view('admin.komentar.datakomen', compact('film', 'komentars'));
}

    public function store(Request $request, $id_film)
    {
        $request->validate([
            'isi_komentar' => 'nullable|string',
            'rating' => '|integer|min:1|max:5',
            'parent_id' => 'nullable|exists:komentar,id'
        ]);

        // Cek apakah user sudah memberikan komentar utama
        if (!$request->parent_id && Komentar::userHasCommented($id_film, Auth::id())) {
            return back()->with('error', 'Anda hanya bisa memberikan satu komentar utama per film.');
        }

        Komentar::create([
            'id_user' => Auth::id(),
            'id_film' => $id_film,
            'isi_komentar' => $request->isi_komentar,
            'rating' => $request->rating,
            'parent_id' => $request->parent_id
        ]);

    return redirect()->back()->with('success', 'Komentar & Rating berhasil disimpan!');
}
    public function show(Film $film)
    {
        $komentar = $film->komentar()->with('user', 'replies.user')->paginate(10);
    return view('user.film.komentar', compact('film', 'komentar'));
    }

    public function destroy($id)
{
    $komentar = Komentar::findOrFail($id);
    $komentar->delete();

    return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
}

}
