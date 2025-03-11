<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request, $id_film)
    {
        $request->validate([
            'isi_komentar' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'parent_id' => 'nullable|exists:komentar,id'
        ]);

        Komentar::create([
            'id_user' => Auth::id(),
            'id_film' => $id_film,
            'isi_komentar' => $request->isi_komentar,
            'rating' => $request->rating,
            'parent_id' => $request->parent_id,
        ]);
        
        return back()->with('success', 'Komentar berhasil dikirim!');
    }
}
